@extends('layout')

@section('title', 'Create Quiz')

@section('main-content')
    <div class="form-container">
        <div class="form-sliding-container" id="sliding-container">
            <!-- Step 1: Quiz Title -->
            <div class="form-section" id="quiz-title-section">
                <div class="w-50 text-center mb-3">
                    <label for="quiz_title" class="form-label fs-2 mb-3">Quiz Title</label>
                    <input type="text" class="form-control mx-auto" id="quiz_title" placeholder="e.g. Science Quiz">
                </div>
                <div class="d-flex justify-content-between w-50">
                    <button class="btn btn-primary w-100" type="button" id="next-to-question">Next</button>
                </div>
            </div>

            <div>
                <!-- Step 2: First Question and Options -->
                <div class="form-section" id="quiz-question-section-1">
                    <div class="mb-3 w-50 text-center">
                        <label for="quiz_question_1" class="form-label fs-3 mb-3">Question 1</label>
                        <input type="text" class="form-control mx-auto" id="quiz_question_1" placeholder="Enter your question">
                    </div>
                    <div class="options-container w-50 text-center">
                        <label for="quiz_options_1" class="form-label fs-3 mb-3">Options</label>
                        <input type="text" class="form-control mb-2" id="option_1_1" placeholder="Option 1">
                        <input type="text" class="form-control mb-2" id="option_1_2" placeholder="Option 2">
                        <input type="text" class="form-control mb-2" id="option_1_3" placeholder="Option 3" style="display: none;">
                        <input type="text" class="form-control mb-2" id="option_1_4" placeholder="Option 4" style="display: none;">
                    </div>
                    {{-- <div class="d-flex justify-content-between w-50 mt-3">
                        <button class="btn w-100 btn-no-wrap btn-secondary" type="button" id="back-to-title">Back</button>
                        <button class="btn w-100 btn-no-wrap btn-primary" type="button" id="add-option">Add another option</button>
                        <button class="btn w-100 btn-no-wrap btn-success" type="button" id="add-another-question">Add Another Question</button>
                    </div>
                    <button class="btn w-25 btn-no-wrap btn-primary mt-2" type="button" id="submit-quiz">Submit Quiz</button> --}}
                </div>
                  <!-- Buttons Section (Outside of quiz-question-section) -->
                  <div class="form-buttons w-50 d-flex flex-column align-items-center">
                    <button class="btn w-100 btn-no-wrap btn-primary mt-2" type="button" id="add-option">Add another option</button>
                    <button class="btn w-100 btn-no-wrap btn-success mt-2" type="button" id="add-another-question">Add Another Question</button>
                    <button class="btn w-25 btn-no-wrap btn-primary mt-2" type="button" id="submit-quiz">Submit Quiz</button>
                </div>
            </div>
        </div>
    </div>
@endsection
