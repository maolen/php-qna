@extends('layouts.front')

@section('content')
    <div class="card mb-3">

        <h5 class="card-header">
            {{ $question->title }}
        </h5>

        <div class="card-body">
            {{ $question->content }}
        </div>

        <div class="card-footer">
            <div class="d-flex align-items-center justify-content-between">

                <div class="badge badge-secondary">
                    {{ $question->category->name }}
                </div>

                <div class="mr-auto ml-3">
                    {{ $question->user->name }}
                </div>


                <small class="text-muted">
                    {{ $question->created_at->diffForHumans() }}
                </small>

            </div>
        </div>

    </div>

    @auth

        @if(auth()->user()->can('update', $question) || auth()->user()->can('delete', $question))
            <div class="card">

                <div class="card-header">
                    Управление
                </div>

                <div class="card-body d-flex">

                    @can('update', $question)
                        <a class="btn btn-info" href="{{ route('questions.edit', $question) }}">
                            Редактировать
                        </a>
                    @endcan

                    @can('delete', $question)
                        <form method="post" action="{{ route('questions.destroy', $question) }}">
                            @csrf @method('delete')
                            <button class="btn btn-danger ml-2">
                                Удалить
                            </button>
                        </form>
                    @endcan

                </div>

            </div>
        @endif

    @endauth
@endsection
