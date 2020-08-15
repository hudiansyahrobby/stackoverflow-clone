<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Tag;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $tags_arr = explode(',', trim($request['tags']));

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
                    'name' => $tag_name
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
        
        Alert::success('Success Title', 'Your Question Has been Added');

        return redirect('/');
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
        $answer = Answer::find($id);
        return view('viewQuestions', compact(['question', 'answer']));
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
        return view('editQuestion', compact('question'));
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
        $question = Question::find($id);
        $question->title = $request->title;
        $question->content = $request->description;
        $question->user_id = Auth::id();
        $question->save();

        Alert::success('Success', 'Your Question Has been Updated');

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        Alert::success('Success', 'Your Question Has been Deleted');
        return redirect('/');
    }

    /**
     * Upvote Questions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upvote($id)
    {
        //
    }

    /**
     * Downvote Questions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downvote($id)
    {
        //
    }

    /**
     * Comment Questions.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        //
    }
}
