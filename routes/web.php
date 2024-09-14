<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('home');
});

Route::get('/takeQuiz', [QuizController::class, 'takeQuiz'])->name('takeQuiz');
Route::get('/quiz/take/{id}', [QuizController::class, 'showQuiz'])->name('quiz.take');
Route::post('/quiz/{quiz}/submit', [QuizController::class, 'submit'])->name('quiz.submit');


Route::get('/createQuiz', [QuizController::class, 'createQuiz'])->name('createQuiz');
Route::post('/quiz/store', [QuizController::class, 'store'])->name('quiz.store');
