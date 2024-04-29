<?php

namespace App\Models;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use HasFactory, BroadcastsEvents;

    protected $table = "chatrooms";

    protected $fillable = ['name'];

    public function broadcastOn(): Channel
    {
        return new Channel('chatrooms');
    }

    public function broadcastAs(string $event): string
    {
        return $event;
    }
}
