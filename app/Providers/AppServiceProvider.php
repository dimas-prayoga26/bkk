<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrap(); // pagination

        Gate::define('admin', function(User $user) {
          return $user->isAdmin();
        });

        Gate::define('adminsekolah', function(User $user) {
          return $user->isAdminSekolah();
        });

        Gate::define('admindudi', function(User $user) {
          return $user->isAdminDudi();
        });

        Gate::define('pelamar', function(User $user) {
          return $user->isPelamar();
        });

        Gate::define('pelamarumum', function(User $user) {
          return $user->isPelamarUmum();
        });

        Gate::define('pelamaralumni', function(User $user) {
          return $user->isPelamarAlumni();
        });
    }
}
