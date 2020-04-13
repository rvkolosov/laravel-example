<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::unsetEventDispatcher();

        Post::create([
            'slug' => ['ru' => 'proverka', 'en' => 'testing'],
            'user_id' => \App\User::first()->id,
            'title' => ['ru' => 'Проверка', 'en' => 'Testing'],
            'description' => ['ru' => 'описание', 'en' => 'description'],
            'text' => ['ru' => 'текст', 'en' => 'text'],
        ]);
    }
}
