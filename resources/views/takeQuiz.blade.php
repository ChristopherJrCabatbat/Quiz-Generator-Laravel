@extends('layout')

@section('title', 'Take Quiz')

@section('styles-links')
@endsection

@section('main-content')
    <div class="header">
        <h1 class="">Quiz Generator</h1>
    </div>
    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('takeQuiz') }}" class="btn btn-primary px-5 btn-lg btn-no-wrap">Take Quiz</a>
        <a href="{{ route('createQuiz') }}" class="btn btn-success px-5 btn-lg btn-no-wrap">Create Quiz</a>
    </div>
@endsection

@section('scripts')
@endsection
