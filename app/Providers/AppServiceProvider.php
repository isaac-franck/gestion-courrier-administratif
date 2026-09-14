<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
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
    Schema::defaultStringLength(191);

    View::composer('*', function ($view) {

        $nombreNotificationsNonLues = 0;

        if (Auth::check()) {
            $nombreNotificationsNonLues = Auth::user()
                ->unreadNotifications()
                ->count();
        }

        $view->with(
            'nombreNotificationsNonLues',
            $nombreNotificationsNonLues
        );
    });
}
}
