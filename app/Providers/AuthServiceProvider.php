<?php

namespace App\Providers;

use App\Policies\PlayerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        Gate::define("authenticate", function ($user){
            return $user->email !== "";
        });

        Gate::define("create", [PlayerPolicy::class, "create"]);
        Gate::define("update", [PlayerPolicy::class, "update"]);
        Gate::define("delete", [PlayerPolicy::class, "delete"]);
    }
}
