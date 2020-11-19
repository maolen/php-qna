<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')
            ],
            'title' => 'required|max:255',
            'content' => 'required',
        ];
    }
}
