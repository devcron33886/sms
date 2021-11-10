<?php

namespace App\Providers;

use App\Models\Question;
use App\Notifications\QuestionNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Question::observe(QuestionNotification::class);
    }
}
