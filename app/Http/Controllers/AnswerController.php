<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
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
        return view('newAnswer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
