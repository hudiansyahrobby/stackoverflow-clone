<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Comment;
use App\Tag;
use App\Reputation;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newQuestions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Handle the tags first
        // 1. Remove whitespace and turn to array
        $tags_arr = explode(',', strtolower($request['tags']));

        // 2. Looping into array
        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();

            // 3. If tag already exist, take the ID
            if($tag) {
                $tag_ids[] = $tag->id;
            } 
            // 4. If not, save it first and take the ID
            else {
                $new_tag = Tag::create([
                    'name' => trim($tag_name)
                ]);
                $tag_ids[] = $new_tag->id;
            }
        }

        // Save the question
        $question = Question::create([
            'title' => $request['title'],
            'content' => $request['description'],
            'user_id' => Auth::id(),
        ]);

        $question->tags()->sync($tag_ids);
        
        Alert::success('Success', 'Your Question Has been Added');

        return redirect()->action(
            'QuestionController@show', ['question_id' => $question->id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('viewQuestions', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $tags_name = [];

        foreach ($question->tags as $tag) {
            $tags_name[] = $tag->name;
        }

        return view('editQuestion', compact('question', 'tags_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Handle the tags first
        // 1. Remove whitespace and turn to array
        $tags_arr = explode(',', strtolower($request['tags']));

        // 2. Looping into array
        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::where('name', $tag_name)->first();

            // 3. If tag already exist, take the ID
            if($tag) {
                $tag_ids[] = $tag->id;
            } 
            // 4. If not, save it first and take the ID
            else {
                $new_tag = Tag::create([
                    'name' => trim($tag_name)
                ]);
                $tag_ids[] = $new_tag->id;
            }
        }

        $question = Question::find($id)->update([
            'title' => $request['title'],
            'content' => $request['description'],
            'user_id' => Auth::id(),
        ]);

        Question::find($id)->tags()->sync($tag_ids);

        Alert::success('Success', 'Your Question Has been Updated');

        return redirect()->action(
            'QuestionController@show', ['question_id' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // remove question_tag
        Question::find($id)->tags()->detach();

        // remove question comment
        Comment::where('question_id', $id)->delete();

        // remove answer comment
        $answers = Answer::where('question_id', $id)->get();
        foreach ($answers as $answer) {
            Comment::where('answer_id', $answer->id)->delete();
        }
        
        // remove answer
        Answer::where('question_id', $id)->delete();

        // finally me remove the question
        Question::destroy($id);
        Alert::success('Success', 'Your Question Has been Deleted');
        return redirect('/');
    }

    /**
     * Set the best answer
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setBestAnswer($id)
    {
        // find the question
        $question = Question::find(Answer::find($id)->question_id);

        // check if the best answer is already set or not
        if ($question->best_answer_id != null) { // if already set
            // find the old answer and decrease 15 point from his/her reputation
            $oldAnswer = Answer::find($question->best_answer_id);
            $oldReputation = Reputation::where('user_id', $oldAnswer->user_id)->first();
            $point = $oldReputation->point;
            $point = $point - 15;

            // last, we update the reputation.
            $oldReputation->update([
                'point' => $point
            ]);
        }

        // update the best answer
        $question->update(['best_answer_id' => $id]);

        // add 15 point to user reputation who make the answer
        $answer = Answer::find($id);
        $reputation = Reputation::where('user_id', $answer->user_id)->first();
        $point = $reputation->point;
        $point = $point + 15;

        // last, we update the reputation.
        $reputation->update([
            'point' => $point
        ]);

        Alert::success('Success', 'This answer is set as the best answer!');

        return redirect()->action(
            'QuestionController@show',
            ['question_id' => Answer::find($id)->question_id]
        );
    }
}
