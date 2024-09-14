@extends('layout')

@section('title', 'Take Quiz')

@section('styles-links')
    <style>
        .quiz-container {
            margin-top: 5vh;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-number {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .question-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .options-list {
            list-style: none;
            padding: 0;
        }

        .options-list li {
            margin-bottom: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .progress-container {
            margin-top: 20px;
        }

        .progress-bar {
            width: 100%;
            height: 20px;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background-color: #28a745;
            width: 0%;
            transition: width 0.4s ease;
        }

        .submit-btn {
            display: none;
        }

        .correct-answer {
            color: green;
            font-weight: bold;
        }
    </style>
@endsection

@section('main-content')
    <div class="quiz-container">
        <!-- Quiz Title -->
        <h2 class="text-center">{{ $quiz->title }}</h2>
        <!-- Display the user's score at the top -->
        @if (isset($score) && isset($totalQuestions))
            <div class="text-center mt-4">
                <h2>Your Score: {{ $score }}/{{ $totalQuestions }}</h2>
            </div>
        @endif

        <!-- Progress Indicator -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-bar-fill" id="progress-bar-fill"></div>
            </div>
            <p class="text-center mt-2">Question <span id="current-question-number">1</span> of {{ count($quiz->questions) }}</p>
        </div>

        <!-- Question and Options -->
        <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" id="quiz-form">
            @csrf

            <div id="question-section">
                @foreach ($quiz->questions as $index => $question)
                    <p class="question-number">Question {{ $index + 1 }}:</p>
                    <h4 class="question-title">{{ $question['question'] }}</h4>
                    <ul class="options-list">
                        @foreach ($question['options'] as $optionIndex => $option)
                            @php
                                $isChecked = isset($userAnswers[$index]) && $userAnswers[$index] === $option;
                                $isCorrect = $option === $question['correct_answer'];
                            @endphp
                            <li>
                                <input type="radio" name="answers[{{ $index }}]" id="option-{{ $index }}-{{ $optionIndex }}" value="{{ $option }}" {{ $isChecked ? 'checked' : '' }} {{ isset($score) ? 'disabled' : '' }}>
                                <label for="option-{{ $index }}-{{ $optionIndex }}">{{ $option }}</label>
                                
                                <!-- Conditionally show the correct answer only after submission -->
                                @if (isset($score) && $isCorrect)
                                    <span class="correct-answer">*check* correct answer</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="btn-container">
                <button type="button" class="btn btn-secondary" id="prev-btn" disabled>Previous</button>
                <button type="button" class="btn btn-primary" id="next-btn">Next</button>
                <button type="submit" class="btn btn-success submit-btn" id="submit-btn">Submit</button>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script>
        let currentQuestion = 0;
        const totalQuestions = {{ count($quiz->questions) }};
        const questions = @json($quiz->questions);

        const progressBarFill = document.getElementById('progress-bar-fill');
        const questionTitle = document.getElementById('question-title');
        const questionSection = document.getElementById('question-section');
        const currentQuestionNumber = document.getElementById('current-question-number');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');
        const quizForm = document.getElementById('quiz-form');

        function loadQuestion(index) {
            const questionElements = document.querySelectorAll('#question-section > p, #question-section > h4, #question-section > ul');
            questionElements.forEach((element, i) => {
                element.style.display = i === index * 3 || i === index * 3 + 1 || i === index * 3 + 2 ? '' : 'none';
            });

            // Update progress
            progressBarFill.style.width = `${(index + 1) / totalQuestions * 100}%`;
            currentQuestionNumber.textContent = index + 1;

            // Update button states
            prevBtn.disabled = index === 0;
            nextBtn.style.display = index === totalQuestions - 1 ? 'none' : 'inline-block';
            submitBtn.style.display = index === totalQuestions - 1 ? 'inline-block' : 'none';
        }

        // Validate form before submission
        quizForm.addEventListener('submit', (event) => {
            for (let i = 0; i < totalQuestions; i++) {
                const options = document.getElementsByName(`answers[${i}]`);
                let answered = false;
                for (const option of options) {
                    if (option.checked) {
                        answered = true;
                        break;
                    }
                }
                if (!answered) {
                    event.preventDefault();
                    alert(`Please answer question ${i + 1} before submitting.`);
                    return;
                }
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentQuestion < totalQuestions - 1) {
                currentQuestion++;
                loadQuestion(currentQuestion);
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentQuestion > 0) {
                currentQuestion--;
                loadQuestion(currentQuestion);
            }
        });

        // Load the first question on page load
        document.addEventListener('DOMContentLoaded', () => {
            loadQuestion(0);
        });
    </script>
@endsection