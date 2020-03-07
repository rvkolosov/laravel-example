<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\App\User::class)
            ->create();

        $user->assignRole(Role::findByName('admin'));

        $user->assignRole(Role::findByName('user'));
    }
}
