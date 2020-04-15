<?php

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
        \Illuminate\Support\Facades\Artisan::call('permission:create-role admin"');

        \Illuminate\Support\Facades\Artisan::call('permission:create-role user');
    }
}
