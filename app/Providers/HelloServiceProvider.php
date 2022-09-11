<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\HelloController;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer(
            'Hello.index',
            function ($view) {
                dd('view');
                $view->with('view_message', 'composer message!');
            }
        );
        // View::composer(
        //     'Hello.index',
        //     'App\Http\Composers\HelloComposer'
        // );
    }
}
