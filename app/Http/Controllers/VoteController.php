<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\User;
use App\Answer;
use App\Question;
use App\Reputation;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class VoteController extends Controller
{
    /**
     * Upvote question
     *
     * @return \Illuminate\Http\Response
     */
    public function upvoteQ($id)
    {
        // check if the user who give vote is the same user who make the question
        if (Auth::id() == Question::find($id)->user_id) {
            Alert::warning('Cannot Vote', 'You cannot upvote or downvote your own question!');
        } else {
            // check if vote already exist or not
            $isVoteExist = Vote::where('question_id', $id)->where('user_id', Auth::id())->first();

            // if not exist, just put new vote, 0 is false, 1 is true
            if ($isVoteExist == null) {
                // save the upvote first, and then...
                $vote = Vote::create([
                    'upvote' => 1,
                    'downvote' => 0,
                    'user_id' => Auth::id(),
                    'answer_id' => null,
                    'question_id' => $id
                ]);

                // find the user who make the question...
                $question = Question::find($id);
                $user = User::find($question->user_id);

                // extract his/her reputation point...
                $reputation = Reputation::where('user_id', $user->id)->first();
                $point = $reputation->point;

                // and add 10 reputation to it...
                $point = $point + 10;

                // last, we update the reputation.
                $reputation->update([
                    'point' => $point
                ]);
            }
            // now is the tricky part, if vote already exist, then...
            else {
                // check if the vote is upvote or downvote...
                // if it is upvote then do nothing, but...
                // if it is downvote then...
                if ($isVoteExist->downvote == 1) { // it means this is downvote
                    // we will change it to upvote
                    $isVoteExist->update([
                        'upvote' => 1,
                        'downvote' => 0
                    ]);

                    // and then add 11 point to reputation
                    // why 11? because we add 10 point from upvote and return 1 point from downvote reducing
                    $question = Question::find($id);
                    $reputation = Reputation::where('user_id', $question->user_id)->first();
                    $point = $reputation->point;
                    $point = $point + 11;

                    // last, we update the reputation.
                    $reputation->update([
                        'point' => $point
                    ]);
                }
            }
        }

        return redirect()->action(
            'QuestionController@show',
            ['question_id' => $id]
        );
    }

    /**
     * Downvote question
     *
     * @return \Illuminate\Http\Response
     */
    public function downvoteQ($id)
    {
        // check if the user who give vote is the same user who make the question
        if (Auth::id() == Question::find($id)->user_id) {
            Alert::warning('Cannot Vote', 'You cannot upvote or downvote your own question!');
        } else {
            // let's check the voter reputation first...
            $voterReputation = Reputation::where('user_id', Auth::id())->first();

            // if the voter rep is 15 or greater, then he/she can downvote
            if ($voterReputation->point >= 15) {
                // check if vote already exist or not
                $isVoteExist = Vote::where('question_id', $id)->where('user_id', Auth::id())->first();

                // if not exist, just put new vote, 0 is false, 1 is true
                if ($isVoteExist == null) {
                    // save the downvote first, and then...
                    $vote = Vote::create([
                        'upvote' => 0,
                        'downvote' => 1,
                        'user_id' => Auth::id(),
                        'answer_id' => null,
                        'question_id' => $id
                    ]);

                    // find the user who make the question...
                    $question = Question::find($id);
                    $user = User::find($question->user_id);

                    // extract his/her reputation point...
                    $reputation = Reputation::where('user_id', $user->id)->first();
                    $point = $reputation->point;

                    // and reduce 1 reputation to it...
                    $point = $point - 1;

                    // last, we update the reputation.
                    $reputation->update([
                        'point' => $point
                    ]);
                }
                // now is the tricky part, if vote already exist, then...
                else {
                    // check if the vote is upvote or downvote...
                    // if it is downvote then do nothing, but...
                    // if it is upvote then...
                    if ($isVoteExist->upvote == 1) { // it means this is upvote
                        // we will change it to downvote
                        $isVoteExist->update([
                            'upvote' => 0,
                            'downvote' => 1
                        ]);

                        // and then reduce 11 point to reputation
                        // why 11? because we reduce 1 point from downvote and remove 10 point from upvote before
                        $question = Question::find($id);
                        $reputation = Reputation::where('user_id', $question->user_id)->first();
                        $point = $reputation->point;
                        $point = $point - 11;

                        // last, we update the reputation.
                        $reputation->update([
                            'point' => $point
                        ]);
                    }
                }
            }
            // else, let's give them the reason why he/she can't downvote
            else {
                Alert::warning('Cannot Downvote', 'Your reputation must be 15 or greater to downvote!');
            }
        }

        return redirect()->action(
            'QuestionController@show',
            ['question_id' => $id]
        );
    }

    /**
     * Upvote asnwer
     *
     * @return \Illuminate\Http\Response
     */
    public function upvoteA($id)
    {
        // check if the user who give vote is the same user who make the answer
        if (Auth::id() == Answer::find($id)->user_id) {
            Alert::warning('Cannot Vote', 'You cannot upvote or downvote your own answer!');
        } else {
            // check if vote already exist or not
            $isVoteExist = Vote::where('answer_id', $id)->where('user_id', Auth::id())->first();

            // if not exist, just put new vote, 0 is false, 1 is true
            if ($isVoteExist == null) {
                // save the upvote first, and then...
                $vote = Vote::create([
                    'upvote' => 1,
                    'downvote' => 0,
                    'user_id' => Auth::id(),
                    'answer_id' => $id,
                    'question_id' => null
                ]);

                // find the user who make the answer...
                $answer = Answer::find($id);
                $user = User::find($answer->user_id);

                // extract his/her reputation point...
                $reputation = Reputation::where('user_id', $user->id)->first();
                $point = $reputation->point;

                // and add 10 reputation to it...
                $point = $point + 10;

                // last, we update the reputation.
                $reputation->update([
                    'point' => $point
                ]);
            }
            // now is the tricky part, if vote already exist, then...
            else {
                // check if the vote is upvote or downvote...
                // if it is upvote then do nothing, but...
                // if it is downvote then...
                if ($isVoteExist->downvote == 1) { // it means this is downvote
                    // we will change it to upvote
                    $isVoteExist->update([
                        'upvote' => 1,
                        'downvote' => 0
                    ]);

                    // and then add 11 point to reputation
                    // why 11? because we add 10 point from upvote and return 1 point from downvote reducing
                    $answer = Answer::find($id);
                    $reputation = Reputation::where('user_id', $answer->user_id)->first();
                    $point = $reputation->point;
                    $point = $point + 11;

                    // last, we update the reputation.
                    $reputation->update([
                        'point' => $point
                    ]);
                }
            }
        }

        return redirect()->action(
            'QuestionController@show',
            ['question_id' => Answer::find($id)->question_id]
        );
    }

    /**
     * Downvote answer
     *
     * @return \Illuminate\Http\Response
     */
    public function downvoteA($id)
    {
        // check if the user who give vote is the same user who make the answer
        if (Auth::id() == Answer::find($id)->user_id) {
            Alert::warning('Cannot Vote', 'You cannot upvote or downvote your own answer!');
        } else {
            // let's check the voter reputation first...
            $voterReputation = Reputation::where('user_id', Auth::id())->first();

            // if the voter rep is 15 or greater, then he/she can downvote
            if ($voterReputation->point >= 15) {
                // check if vote already exist or not
                $isVoteExist = Vote::where('answer_id', $id)->where('user_id', Auth::id())->first();

                // if not exist, just put new vote, 0 is false, 1 is true
                if ($isVoteExist == null) {
                    // save the downvote first, and then...
                    $vote = Vote::create([
                        'upvote' => 0,
                        'downvote' => 1,
                        'user_id' => Auth::id(),
                        'answer_id' => $id,
                        'question_id' => null
                    ]);

                    // find the user who make the answer...
                    $answer = Answer::find($id);
                    $user = User::find($answer->user_id);

                    // extract his/her reputation point...
                    $reputation = Reputation::where('user_id', $user->id)->first();
                    $point = $reputation->point;

                    // and reduce 1 reputation to it...
                    $point = $point - 1;

                    // last, we update the reputation.
                    $reputation->update([
                        'point' => $point
                    ]);
                }
                // now is the tricky part, if vote already exist, then...
                else {
                    // check if the vote is upvote or downvote...
                    // if it is downvote then do nothing, but...
                    // if it is upvote then...
                    if ($isVoteExist->upvote == 1) { // it means this is upvote
                        // we will change it to downvote
                        $isVoteExist->update([
                            'upvote' => 0,
                            'downvote' => 1
                        ]);

                        // and then reduce 11 point to reputation
                        // why 11? because we reduce 1 point from downvote and remove 10 point from upvote before
                        $answer = Answer::find($id);
                        $reputation = Reputation::where('user_id', $answer->user_id)->first();
                        $point = $reputation->point;
                        $point = $point - 11;

                        // last, we update the reputation.
                        $reputation->update([
                            'point' => $point
                        ]);
                    }
                }
            }
            // else, let's give them the reason why he/she can't downvote
            else {
                Alert::warning('Cannot Downvote', 'Your reputation must be 15 or greater to downvote!');
            }
        }

        return redirect()->action(
            'QuestionController@show',
            ['question_id' => Answer::find($id)->question_id]
        );
    }
}
