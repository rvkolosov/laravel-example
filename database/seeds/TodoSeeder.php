<?php

use App\Models\Todo;
use App\User;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        Todo::unsetEventDispatcher();

        factory(Todo::class, rand(10, 20))->create([
            'user_id' => $user->id,
        ]);
    }
}
