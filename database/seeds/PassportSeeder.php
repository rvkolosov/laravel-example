<?php

use Illuminate\Database\Seeder;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('passport:install');

        DB::table('oauth_clients')
            ->where('id', 2)
            ->update([
                'secret' => config('passport.test_secret'),
            ]);
    }
}
