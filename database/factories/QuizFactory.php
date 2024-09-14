<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'questions' => [
                [
                    'question' => 'What is the capital of France?',
                    'options' => ['Paris', 'London', 'Berlin'],
                    'correct_answer' => 'Paris',
                ],
                [
                    'question' => 'What is 2 + 2?',
                    'options' => ['3', '4', '5'],
                    'correct_answer' => '4',
                ]
            ],
        ];
    }
}