<?php

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = Room::create([
            'user_id' => 1,
            'name' => 'default',
        ]);

        $room->users()->attach(1);
    }
}
