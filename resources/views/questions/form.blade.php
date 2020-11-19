<?php
$question = $question ?? null;
    ?>

@extends('layouts.front')

@section('content')
    <h1 class="mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12 col-md-6">

            <form action="{{ route($question ? 'questions.update' : 'questions.store', $question) }}" method="post" class="card card-body">
                @csrf
                @if($question)
                    @method('put')
                @endif

                <div class="form-group">

                    <label for="title">О чем вопрос?</label>

                    <input class="form-control @error('title') is-invalid @enderror "
                           value="{{ old('title', $question->title ?? null) }}"
                           type="text" id="title" name="title" placeholder="Введите вопрос...">

                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="category_id">Категория</label>

                    <select class="form-control @error('category_id') is-invalid @enderror "
                            name="category_id" id="category_id">

                        @foreach($categories as $category)
                            <option {{ old('category_id', $question->category_id ?? null) == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>


                <div class="form-group">
                    <label for="content">Напишите подробнее</label>
                    <textarea class="form-control @error('content') is-invalid @enderror "
                              name="content"
                              id="content"
                              rows="5"
                              placeholder="Максимально подробно напишите свой вопрос...">{{ old('content', $question->content ?? null) }}</textarea>

                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <button class="btn btn-success">
                    Сохранить
                </button>

            </form>

        </div>
    </div>
@endsection
