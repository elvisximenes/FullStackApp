<?php

namespace App\Policies;

use App\User;
use App\Answer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function accept(User $user, Answer $answer)
    {
        return $user->id === $answer->question->user_id;
    }

    public function update(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can delete the answer.
     *
     * @param  \App\User  $user
     * @param  \App\Answer  $answer
     * @return mixed
     */
    public function delete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can restore the answer.
     *
     * @param  \App\User  $user
     * @param  \App\Answer  $answer
     * @return mixed
     */
    
}
