<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use App\models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'g.machielsen@gmail.com',
            'password'=>bcrypt('Bartje83!'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);
    }
}
