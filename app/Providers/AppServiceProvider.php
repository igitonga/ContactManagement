<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Group;

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
        $groups = Group::latest()->get();
        view()->share('groups', $groups);
    }
}
