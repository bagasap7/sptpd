<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


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
        Blade::directive('currency',function ($expression)
        {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });

        Gate::define('admin', function (User $user) {
            return $user->akses == 1;
        });

        Gate::define('wp_admin', function (User $user) {
            return $user->akses == 2;
        });
        
    }
}
