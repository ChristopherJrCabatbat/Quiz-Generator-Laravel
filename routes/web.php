<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('home');
});

Route::get('/takeQuiz', [QuizController::class, 'takeQuiz'])->name('takeQuiz');
Route::get('/createQuiz', [QuizController::class, 'createQuiz'])->name('createQuiz');
