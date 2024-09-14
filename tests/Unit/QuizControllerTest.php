<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Quiz;

class QuizControllerTest extends TestCase
{
    use RefreshDatabase; // Use this trait to reset the database state between tests

    /**
     * Test submitting a quiz with all questions answered correctly.
     *
     * @return void
     */
    public function testSubmitQuizAllQuestionsAnsweredCorrectly()
    {
        // Create a quiz and its questions
        $quiz = Quiz::factory()->create();
        $quiz->questions = [
            ['question' => 'Q1', 'options' => ['A', 'B', 'C'], 'correct_answer' => 'A'],
            ['question' => 'Q2', 'options' => ['D', 'E', 'F'], 'correct_answer' => 'E']
        ];
        $quiz->save();

        // Simulate a POST request to submit answers
        $response = $this->post(route('quiz.submit', $quiz->id), [
            'answers' => ['0' => 'A', '1' => 'E']
        ]);

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the view received the expected score and total questions
        $response->assertViewHas('score', 2);
        $response->assertViewHas('totalQuestions', 2);
    }

    /**
     * Test submitting a quiz with some unanswered questions.
     *
     * @return void
     */
    public function testSubmitQuizWithUnansweredQuestions()
    {
        // Create a quiz and its questions
        $quiz = Quiz::factory()->create();
        $quiz->questions = [
            ['question' => 'Q1', 'options' => ['A', 'B', 'C'], 'correct_answer' => 'A'],
            ['question' => 'Q2', 'options' => ['D', 'E', 'F'], 'correct_answer' => 'E']
        ];
        $quiz->save();

        // Simulate a POST request to submit answers with one unanswered question
        $response = $this->post(route('quiz.submit', $quiz->id), [
            'answers' => ['0' => 'A'] // Only one answer provided
        ]);

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the view received the expected score and total questions
        $response->assertViewHas('score', 1);
        $response->assertViewHas('totalQuestions', 2);
    }

    /**
     * Test submitting a quiz with all questions answered incorrectly.
     *
     * @return void
     */
    public function testSubmitQuizAllQuestionsAnsweredIncorrectly()
    {
        // Create a quiz and its questions
        $quiz = Quiz::factory()->create();
        $quiz->questions = [
            ['question' => 'Q1', 'options' => ['A', 'B', 'C'], 'correct_answer' => 'A'],
            ['question' => 'Q2', 'options' => ['D', 'E', 'F'], 'correct_answer' => 'E']
        ];
        $quiz->save();

        // Simulate a POST request to submit incorrect answers
        $response = $this->post(route('quiz.submit', $quiz->id), [
            'answers' => ['0' => 'B', '1' => 'F'] // Wrong answers
        ]);

        // Assert that the response status is 200 OK
        $response->assertStatus(200);

        // Assert that the view received the expected score (0) and total questions
        $response->assertViewHas('score', 0);
        $response->assertViewHas('totalQuestions', 2);
    }
}