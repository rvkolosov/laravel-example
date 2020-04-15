<?php

use App\User;
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
        User::unsetEventDispatcher();

        $user = factory(User::class)
            ->create();

        $user->assignRole(Role::findByName('admin'));

        $user->assignRole(Role::findByName('user'));

        $user = factory(User::class)
            ->create([
                'email' => 'test1@test.com',
            ]);

        $user->assignRole(Role::findByName('user'));
    }
}
