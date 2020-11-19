@extends('layouts.front')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="mb-0">
            {{ $title }}
        </h1>

        @can('create', 'App\Models\Question')
            <a href="{{ route('questions.create') }}" class="btn btn-success">
                Задать вопрос
            </a>
        @endcan
    </div>

    @if($questions->isEmpty())

        <div class="alert alert-secondary">
            Вопросов нет. Будь первым!
        </div>

    @else

        @foreach($questions as $question)
            <div class="mb-3">
            @include('components.question-card')
            </div>
        @endforeach

    @endif

@endsection
