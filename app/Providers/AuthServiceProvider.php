<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // dd(Auth::user());
        // if (Auth::user()->id_wajib_pajak) {
        //     view()->share('jenispajak', ObjekPajak::where('id_wajib_pajak',Auth::user()->id_wajib_pajak)->groupBy('id_jenis_pajak')->get());
           
        // }
    }
}
