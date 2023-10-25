<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->assertDatabaseCount('users', 81);
        $this->assertDatabaseHas('users',[
            'email' => 'taghavey.hassan@gmail.com',
        ]);
        $this->assertDatabaseMissing('users',[
            'email' => 'mojtaba.keshavarz.aghrab@gmail.com',
        ]);
    }
}
