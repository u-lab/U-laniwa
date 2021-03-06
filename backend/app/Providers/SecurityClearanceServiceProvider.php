<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class SecurityClearanceServiceProvider extends ServiceProvider
{


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {

        $this->registerPolicies();

        $gate->define('level1~', function (User $user): bool {
            return $user->user_role_id >= 10;
        });
        $gate->define('level2~', function (User $user): bool {
            return $user->user_role_id >= 20;
        });
        $gate->define('level3~', function (User $user): bool {
            return $user->user_role_id >= 30;
        });
        $gate->define('level4~', function (User $user): bool {
            return $user->user_role_id >= 40;
        });
        $gate->define('level5~', function (User $user): bool {
            return $user->user_role_id >= 50;
        });
        $gate->define('level6~', function (User $user): bool {
            return $user->user_role_id >= 60;
        });
        $gate->define('level7~', function (User $user): bool {
            return $user->user_role_id >= 70;
        });

        //
    }
}