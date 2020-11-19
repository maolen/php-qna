@extends('layouts.admin')

@section('content')

    <div class="mb-3 d-flex aline-items-center justify-content-between">
        <h1 class="mb-0">{{ $title }}</h1>

        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">Добавить</a>
    </div>


    @if($categories->isEmpty())

        <div class="alert alert-secondary">
            Нет категорий
        </div>

    @else
        <div class="card card-body">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Название</th>
                    <th width="1%"></th>
                </tr>
                </thead>

                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.categories.destroy', $category) }}">
                                @csrf @method('delete')

                                <div class="btn-group btn-group-sm">
                                    <a class="btn btn-info"
                                       href="{{ route('admin.categories.edit', $category) }}">Редактировать</a>
                                    <button class="btn btn-danger">
                                        Удалить
                                    </button>

                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @if($categories->hasPages())
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        @endif
    @endif


@endsection
