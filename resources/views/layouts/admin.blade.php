@extends('layouts.app', [
    'brand' => route('admin.dashboard'),
])

@section('navbar')

    <x-navbar.link to="{{ url('/') }}">
        На сайт
    </x-navbar.link>

    <x-navbar.link to="{{ route('admin.categories.index') }}">
        Категории
    </x-navbar.link>

@endsection
