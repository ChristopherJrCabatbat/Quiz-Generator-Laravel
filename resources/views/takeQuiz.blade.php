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
    <div class="container padding-top text-center">
        <div class="header mb-4">
            <h1 class="">Choose Quiz to Take</h1>
        </div>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            @foreach($quizzes as $quiz)
                <a href="{{ route('quiz.take', $quiz->id) }}" class="btn btn-primary quiz-btn">
                    {{ $quiz->title }}
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
@endsection
