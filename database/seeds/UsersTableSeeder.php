<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Role;

use App\Role_User;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use  Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $admin = User::truncate();
      DB::table('role_user')->truncate();
      DB::table('outlets')->truncate();
      Schema::disableForeignKeyConstraints();

        // ... Some Truncate Query

      Schema::enableForeignKeyConstraints();

      User::create([
        'name' => 'admin',
         'email' =>'admin@gmail.com',
         'password' => Hash::make('12345678')
      ]);



        $superviseur = User::create([
            'name' => 'superviseur',
            'email' =>'superviseur@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $utilisateur = User::create([
            'name' => 'utilisateur',
            'email' =>'utilisateur@utilisateur.com',
            'password' => Hash::make('12345678')
        ]);

        $superadmin = User::create([
            'name' => 'superadmin',
            'email' =>'superadmin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $adminRole = Role::where('name','admin')->first();
        $superviseurRole = Role::where('name','superviseur')->first();
        $utilisateurRole = Role::where('name','utilisateur')->first();
        $superadminRole = Role::where('name','superadmin')->first();

        $admin->roles()->attach($adminRole);
        $superviseur->roles()->attach($superviseurRole);
        $utilisateur->roles()->attach($utilisateurRole);
        $superadmin->roles()->attach($superadminRole);

    }

}
