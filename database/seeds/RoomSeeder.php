<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::unsetEventDispatcher();

        $user = \App\User::find(1);

        $room = Room::create([
            'user_id' => $user->id,
            'name' => 'default',
        ]);

        $room->users()->attach($user);

        $user = \App\User::find(2);

        $room->users()->attach($user);
    }
}
