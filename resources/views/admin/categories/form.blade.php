<?php
$category = $category ?? null;
?>
@extends('layouts.admin')

@section('content')

    <h1 class="mb-3">
        {{ $title }}
    </h1>

    <div class="row">
        <div class="col-12 col-md-4">

            <form class="card card-body"
                  method="post"
                  action="{{ $category ? route('admin.categories.update', $category) : route('admin.categories.store') }}">

                @csrf
                @if($category) @method('put') @endif

                <div class="form-group">

                    <label for="name">Название <span class="text-danger">*</span></label>

                    <input required
                           class="form-control @error('name') is-invalid @enderror "
                           value="{{ old('name', $category->name ?? null) }}"
                           type="text" name="name" id="name" placeholder="Введите имя...">

                    @error('name')
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
