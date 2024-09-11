@extends('layout')

@section('title', 'Create Quiz')

@section('styles-links')
    <style>
        .padding-top {
            padding-top: 20vh;
        }
    </style>
@endsection

@section('main-content')
    <div class="form-container">
        <div class="form-sliding-container" id="sliding-container">
            <!-- Step 1: Quiz Title -->
            <div class="form-section" id="quiz-title-section">
                <div class="mb-3 text-center">
                    <label for="quiz_title" class="form-label fs-2 mb-3">Quiz Title</label>
                    <input type="text" class="form-control w-100 mx-auto" id="quiz_title" aria-describedby="quiz_title"
                        placeholder="e.g. Science Quiz">
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-primary" type="button" id="next-to-question">Next</button>
                </div>
            </div>

            <!-- Step 2: First Question and Options -->
            <div class="form-section hidden" id="quiz-question-section-1">
                <div class="mb-3 text-center">
                    <label for="quiz_question_1" class="form-label fs-2 mb-3">Question 1</label>
                    <input type="text" class="form-control" id="quiz_question_1" placeholder="Enter your question">
                </div>

                <!-- Options for Question 1 -->
                <div class="options-container" id="options-container-1">
                    <input type="text" class="form-control mb-2" id="option_1_1" placeholder="Option 1">
                    <input type="text" class="form-control mb-2" id="option_1_2" placeholder="Option 2">
                    <input type="text" class="form-control mb-2" id="option_1_3" placeholder="Option 3 (optional)"
                        style="display: none;">
                    <input type="text" class="form-control mb-2" id="option_1_4" placeholder="Option 4 (optional)"
                        style="display: none;">
                    <button class="btn btn-outline-secondary mb-3" id="add-option-1" type="button">Add Another
                        Option</button>
                </div>

                <!-- Correct Answer for Question 1 -->
                <div class="mb-3">
                    <label for="correct_answer_1" class="form-label">Correct Answer</label>
                    <select class="form-control" id="correct_answer_1">
                        <option value="option_1_1">Option 1</option>
                        <option value="option_1_2">Option 2</option>
                        <option value="option_1_3" style="display: none;">Option 3</option>
                        <option value="option_1_4" style="display: none;">Option 4</option>
                    </select>
                </div>

                <!-- Add Another Question Button -->
                <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary" type="button" id="back-to-title">Back</button>
                    <button class="btn btn-primary" type="button" id="add-another-question">Add Another Question</button>
                    <button class="btn btn-success" type="button" id="submit-quiz">Submit Quiz</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
