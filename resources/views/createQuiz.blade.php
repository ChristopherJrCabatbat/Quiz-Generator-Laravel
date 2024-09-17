@extends('layout')

@section('title', 'Create Quiz')

@section('main-content')
    <!-- Back Button -->
    <a href="/" class="back-btn btn btn-secondary" style="z-index:10;">
        <i class="fa-solid fa-home fs-4"></i>
    </a>

    <div class="form-container">
        <!-- Form to submit the quiz data -->
        <form action="{{ route('quiz.store') }}" method="POST">
            @csrf
            <input type="hidden" name="title" id="quiz_title_input">
            <input type="hidden" name="questions" id="questions_input">

            <!-- Back Button (for the sliding container) -->
            <button class="btn btn-secondary m-2" type="button" id="back-to-title" style="display: none;">
                Back
            </button>

            <div class="form-sliding-container" id="sliding-container">
                <!-- Step 1: Quiz Title -->
                <div class="form-section" id="quiz-title-section">
                    <div class="w-50 text-center mb-3">
                        <label for="quiz_title" class="form-label fs-2 mb-3">Quiz Title</label>
                        <input type="text" class="form-control mx-auto" id="quiz_title" placeholder="e.g., Science Quiz"
                            name="title" required>
                    </div>
                    <div class="d-flex justify-content-between w-50">
                        <button class="btn btn-primary w-100" type="button" id="next-to-question">Next</button>
                    </div>
                </div>

                <!-- Quiz Questions and Options -->
                <div class="quiz-question-container" id="quiz-question-container" style="display: none;">
                    <!-- Display Quiz Title Here -->
                    <h3 class="text-center mb-4" id="display-quiz-title"></h3>

                    <!-- Questions Section -->
                    <div id="questions-section">
                        <!-- Step 2: First Question and Options -->
                        <div class="form-section qq-vw mt-4" id="quiz-question-section-1">
                            <div class="d-flex align-items-center mb-3 question-number">
                                <label class="form-label fs-5 me-2">1.</label>
                                <input type="text" class="form-control" id="quiz_question_1"
                                    placeholder="Enter your question" required>
                            </div>
                            <div class="options-container w-50 text-center">
                                <input type="text" class="form-control mb-2" id="option_1_1" placeholder="Option 1"
                                    required>
                                <input type="text" class="form-control mb-2" id="option_1_2" placeholder="Option 2"
                                    required>
                                <input type="text" class="form-control mb-2" id="option_1_3" placeholder="Option 3"
                                    required>
                                <input type="text" class="form-control mb-2" id="option_1_4" placeholder="Option 4"
                                    required>
                            </div>

                            <!-- Correct Answer Section -->
                            <div class="w-50 text-center mb-3">
                                <label for="correct_answer_1" class="form-label fs-4 mb-3">Correct Answer</label>
                                <select class="form-control" id="correct_answer_1" required>
                                    <option value="option_1_1">Option 1</option>
                                    <option value="option_1_2">Option 2</option>
                                    <option value="option_1_3">Option 3</option>
                                    <option value="option_1_4">Option 4</option>
                                </select>
                            </div>
                            <div class="hr">
                                <hr class="mt-4">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons Section -->
                    <div class="form-buttons d-flex flex-column align-items-center mt-4">
                        <button class="btn w-50 btn-no-wrap btn-success mt-2" type="button" id="add-another-question">Add
                            Another Question</button>
                        <button class="btn w-25 btn-no-wrap btn-primary mt-2" type="submit" id="submit-quiz">Submit
                            Quiz</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection