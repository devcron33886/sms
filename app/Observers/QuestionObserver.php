<?php

namespace App\Observers;
use App\Models\Question;
use App\Models\User;
use App\Notifications\QuestionNotification;

class QuestionObserver
{
    public function created(Question $question)
    {
        User::with('mentor')->where('mentor_id', $question->mentor->id)->get()->each(function (User $mentor) use ($question) {
            $mentor->notify(new QuestionNotification($question));
        });
    }
}
