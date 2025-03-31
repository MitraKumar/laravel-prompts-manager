<?php

namespace App\Providers;

use App\Models\Prompt;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('access-tfa', function (?User $user) {
            if (
                ! request()->session()->exists('user_email') ||
                ! request()->session()->exists('user_password') ||
                ! request()->session()->exists('user_otp')
            ) {
                return FALSE;
            }

            return TRUE;
        });

        Gate::define('edit-own-prompt', function (User $user, Prompt $prompt) {
            if (! $prompt->user->is($user)) {
                return FALSE;
            }

            return TRUE;
        });
    }
}
