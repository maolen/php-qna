<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
            ->latest()
            ->paginate(3);

        return view('admin.categories.index', [
            'categories' => $categories,
            'title' => 'Категории'
        ]);
    }

    public function create()
    {
        return view('admin.categories.form', [
            'title' => 'Новая категория',
        ]);
    }

    public function store(CategoryFormRequest $request)
    {
        Category::query()
            ->create($request->validated());

        return redirect()->route('admin.categories.index');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.form', [
            'category' => $category,
            'title' => 'Редактировать категорию',
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
