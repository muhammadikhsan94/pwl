<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Models\Pengguna;

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
        Gate::define('admin', function() {
            return Pengguna::getUser(auth()->user()->id)->id_role == 1;
        });
        Gate::define('customer', function() {
            return Pengguna::getUser(auth()->user()->id)->id_role == 2;
        });
    }
}
