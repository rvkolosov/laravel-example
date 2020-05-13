<?php

namespace Tests\Feature;

use App\Models\Image;
use App\Models\Todo;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        factory(User::class)->make();
        factory(Todo::class)->make();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
