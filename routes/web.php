<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(
    [
        'verify' => true
    ]
);

Route::redirect('/', 'questions');
Route::resource('questions', QuestionController::class);

