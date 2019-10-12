<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class VoteQuestionController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }

    /** 
     * In laravel invoke method is the method that this will be call as soon as this controller is initiate 
     */
    public function __invoke(Question $question)
    {
        $vote = (int)request()->vote;
        
        auth()->user()->voteQuestion($question, $vote);

        return back();

    }
}
