<?php

namespace Tests\Unit;

use App\Room;
use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_room_has(): void
    {
        $room = new Room(['jack', 'alex', 'david']);
        $this->assertTrue($room->has('jack'));
        $this->assertFalse($room->has('omid'));
    }

    public function test_room_add()
    {
        $room = new Room(['jack']);
        $this->assertContains('peter',$room->add('peter'));
    }

    public function test_room_remove()
    {
        $room = new Room(['jack','peter']);
        $this->assertCount(1,$room->remove('peter'));
    }

}
