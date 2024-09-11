<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function takeQuiz()
    {
        return view('takeQuiz');
    }

    public function createQuiz()
    {
        return view('createQuiz');
    }
}
