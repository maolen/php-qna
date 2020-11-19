<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionFormRequest;
use App\Models\Category;
use App\Models\Question;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('password.confirm')
        ->only('destroy');

    }

    public function index()
    {
        $questions = Question::query()
            ->latest()
            ->paginate(10);

        return view(
            'questions.index',
            [
                'title' => 'Все вопросы',
                'questions' => $questions,
            ]
        );
    }


    public function create()
    {
        $this->authorize('create', Question::class);
        return view(
            'questions.form',
            [
                'title' => 'Новый вопрос',
                'categories' => Category::query()->orderBy('name')->get(),
            ]
        );
    }

    public function store(QuestionFormRequest $request)
    {
        $this->authorize('create', Question::class);
        $question = auth()->user()
            ->questions()
            ->create($request->validated());

        return redirect()->route('questions.show', $question);
    }


    public function show(Question $question)
    {
        return view(
            'questions.show',
            [
                'title' => $question->title,
                'question' => $question,
            ]
        );
    }

    public function edit(Question $question)
    {
        $this->authorize('update', $question);

        return view(
            'questions.form',
            [
                'title' => 'Редактировать вопрос',
                'question' => $question,
                'categories' => Category::query()->orderBy('name')->get(),
            ]
        );
    }


    public function update(QuestionFormRequest $request, Question $question)
    {
        $this->authorize('update', $question);
        $question->update($request->validated());
        return redirect()->route('questions.show', $question);

    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();
        return redirect()->route('questions.index');
    }
}
