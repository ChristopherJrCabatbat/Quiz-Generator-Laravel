@extends('layout')

@section('title', 'Take Quiz')

@section('styles-links')
    <style>
        .padding-top {
            padding-top: 10vh;
        }

        .quiz-btn {
            padding: 1rem 2rem;
            font-size: 1.5rem;
        }
    </style>
@endsection

@section('main-content')
    <!-- Back Button -->
    <a href="/" class="back-btn btn btn-secondary" style="z-index:10;">
        <i class="fa-solid fa-home fs-4"></i>
    </a>

    <div class="container padding-top text-center">
        <div class="header mb-4">
            <h1 class="">Choose Quiz to Take</h1>
        </div>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            @foreach ($quizzes as $quiz)
                <div class="quiz-btn-container">
                    <a href="{{ route('quiz.take', $quiz->id) }}" class="quiz-btns">
                        <i class="fa-solid fa-book fs-4"></i>
                        <hr class="separator-line">
                        <span class="quiz_title">{{ $quiz->title }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
@endsection
