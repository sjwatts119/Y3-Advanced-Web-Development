<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(
            //pass the active theme to relevant views
            ['layouts.*', 'home', 'contact.index', 'mail.*', 'filament.admin.logo'],
            //pass in the active theme from the themes model
            fn($view) => $view->with('theme', Theme::getTheme())
        );
    }
}
