<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* gate pour specifier les droit pour parcourir certaine page */

        Gate::define('manage-users', function ($user){

            return $user->hasAnyRole(['superviseur' , 'admin','superadmin' ]);

        });

        Gate::define('manage1-users', function ($user){

            return $user->hasAnyRole(['superviseur' , 'utilisateur','superadmin' ]);

        });

        Gate::define('manage2-users', function ($user){

            return $user->hasAnyRole(['admin','superadmin' ]);

        });

        Gate::define('manage3-users', function ($user){

            return $user->hasAnyRole(['superadmin' ]);

        });


        /* gate pour specifier les droit pour parcourir certaine page */

           Gate::define('edit-users', function ($user){

               return $user->hasAnyRole(['superviseur','admin','superadmin' ]);

        });

        /* gate pour specifier les droit pour parcourir certaine page */

        Gate::define('edit1-users', function ($user){

            return $user->hasAnyRole(['superviseur' ,'utilisateur','superadmin']);

        });


        Gate::define('delete-users', function ($user){

            return $user->hasAnyRole(['superviseur' , 'admin','superadmin' ]);

        });

        Gate::define('delete1-users', function ($user){

            return $user->hasAnyRole(['superviseur' ,'utilisateur' ,'superadmin']);

        });

    }
}
