<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Answer;
use App\Question;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeQ(Request $request, $id)
    {
        $comment = Comment::create([
            'content' => $request['comment'],
            'user_id' => Auth::id(),
            'answer_id' => null,
            'question_id' => $id,
        ]);

        Alert::success('Success', 'Your Comment Has been Saved');

        return redirect()->action(
            'QuestionController@show', ['question_id' => $id]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeA(Request $request, $id)
    {
        $comment = Comment::create([
            'content' => $request['comment'],
            'user_id' => Auth::id(),
            'answer_id' => $id,
            'question_id' => null,
        ]);

        Alert::success('Success', 'Your Comment Has been Saved');
        
        $answer = Answer::find($id);
        
        return redirect()->action(
            'QuestionController@show', ['question_id' => $answer->question_id]
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
        $comment = Comment::find($id);
        $question = null;
        // if $comment->question_id isExist means that this is question comment
        if ($comment->question_id != null) {
            $question = Question::find($comment->question_id);
        } 
        // else it means this is answer comment
        else {
            $answer = Answer::find($comment->answer_id);
            $question = Question::find($answer->question_id);
        }
        
        // remove comment
        Comment::destroy($id);

        Alert::success('Success', 'Your Comment Has been Deleted');
        
        return redirect()->action(
            'QuestionController@show', ['question_id' => $question->id]
        );
    }
}
