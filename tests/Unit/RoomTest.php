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
        $room = new Room(["hassan","mahdi","ali","mohsen"]);
        $this->assertFalse($room->has("mohammad"));
    }

    public function test_room_add()
    {
        $room = new Room(['jack']);
        $room->add('peter');
        $this->assertContains("jack",$room->add("jack"));
    }

    public function test_room_remove()
    {
        $room = new Room(['jack','matola','sogoli']);
        $this->assertCount(2, $room->remove('jack'));
    }
}
