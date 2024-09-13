@extends('layout')

@section('title', 'Quiz Generator')

@section('styles-links')
    <style>
        .padding-top {
            padding-top: 30vh;
        }
    </style>
@endsection

@section('main-content')
    <div class="container padding-top text-center">
        <div class="header mb-4">
            <h1 class="">Quiz Generator</h1>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('takeQuiz') }}" class="btn btn-primary px-5 btn-lg btn-no-wrap">Take Quiz</a>
            <a href="{{ route('createQuiz') }}" class="btn btn-success px-5 btn-lg btn-no-wrap">Create Quiz</a>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
