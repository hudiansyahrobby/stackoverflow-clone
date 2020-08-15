<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Comment;
use App\Question;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class AnswerController extends Controller
{

    function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // public function index($id)
    // {
    //     $user = User::find($id);
    //     return view('myAnswer', compact('user'));
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create($id)
    {
        return view('newAnswer', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $answer = Answer::create([
            'content' => $request['description'],
            'user_id' => Auth::id(),
            'question_id' => $id,
        ]);

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
        $answer = Answer::find($id);
        return view('editAnswer', compact('answer'));
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
        $result = Answer::find($id)->update([
            'content' => $request['description'],
        ]);

        Alert::success('Success', 'Your Answer Has been Updated');

        $answer = Answer::find($id);
        $question = Question::find($answer->question_id);
        return view('viewQuestions', compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $question = Question::find($answer->question_id);

        // remove answer comment
        Comment::where('answer_id', $id)->delete();
        
        // remove answer
        Answer::destroy($id);

        Alert::success('Success', 'Your Answer Has been Deleted');
        
        return view('viewQuestions', compact('question'));
    }

    /**
     * Upvote answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upvote($id)
    {
        //
    }

    /**
     * Downvote answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downvote($id)
    {
        //
    }

    /**
     * Comment answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        //
    }
}
