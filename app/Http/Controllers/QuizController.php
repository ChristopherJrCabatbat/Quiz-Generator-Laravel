<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function takeQuiz()
    {
        // Fetch all quizzes
        $quizzes = Quiz::all();

        // Pass the quizzes to the view
        return view('takeQuiz', compact('quizzes'));
    }


    public function showQuiz($id)
    {
        // Fetch the quiz by ID
        $quiz = Quiz::findOrFail($id);

        // Pass the quiz data to the view
        return view('quiz', compact('quiz'));
    }

    // File path: app/Http/Controllers/QuizController.php

    public function submit(Request $request, $quizId)
    {
        // Retrieve the quiz by ID
        $quiz = Quiz::findOrFail($quizId);

        // Retrieve the user's submitted answers
        $userAnswers = $request->input('answers', []);
        $questions = $quiz->questions; // Assuming questions are stored as an array in the quiz model

        // Calculate the score
        $score = 0;
        $totalQuestions = count($questions);

        foreach ($questions as $index => $question) {
            $correctAnswer = $question['correct_answer']; // This is now the text value
            $userAnswer = $userAnswers[$index] ?? null;

            if ($userAnswer === $correctAnswer) {
                $score++;
            }
        }

        // Pass the score, total number of questions, and user answers to the view
        return view('quiz', [
            'quiz' => $quiz,
            'score' => $score,
            'totalQuestions' => $totalQuestions,
            'userAnswers' => $userAnswers
        ]);
    }




    public function createQuiz()
    {
        return view('createQuiz');
    }

    // public function store(Request $request)
    // {
    //     // Decode the JSON data from the request
    //     $questions = json_decode($request->input('questions'), true);

    //     // Create a new quiz
    //     $quiz = Quiz::create([
    //         'title' => $request->input('title'),
    //         'questions' => $questions, // Storing the questions array as JSON in the database
    //     ]);

    //     // Redirect or return a response
    //     return redirect('/')->with('success', 'Quiz created successfully!');
    // }
    public function store(Request $request)
    {
        // Decode the JSON data from the request
        $questions = json_decode($request->input('questions'), true);

        // Debug: Check if $questions is null
        if (is_null($questions)) {
            return redirect()->back()->with('error', 'Questions data is missing or invalid.');
        }

        // Debug: Log the input to check what is being received
        Log::info('Quiz title: ' . $request->input('title'));
        Log::info('Questions input: ' . $request->input('questions'));
        Log::info('Decoded questions array: ', $questions);

        // Create a new quiz
        $quiz = Quiz::create([
            'title' => $request->input('title'),
            'questions' => $questions, // Storing the questions array as JSON in the database
        ]);

        // Redirect or return a response
        return redirect('/')->with('success', 'Quiz created successfully!');
    }
}
