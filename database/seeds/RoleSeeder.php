<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'user',
        ]);

        Role::create([
            'name' => 'moderator',
        ]);

        Role::create([
            'name' => 'admin',
        ]);
    }
}
