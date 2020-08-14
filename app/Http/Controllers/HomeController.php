<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class HomeController extends Controller
{
    /**
https://www.youtube.com/     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::all();
        return view('home', compact('questions'));
    }
}
