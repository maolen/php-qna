<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;



    public function create(User $user)
    {
        return true;
    }


    public function update(User $user, Question $question)
    {
        return $question->user_id == $user->id;
    }

    public function delete(User $user, Question $question)
    {
        return $question->user_id == $user->id;
    }


}
