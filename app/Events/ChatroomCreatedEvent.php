<?php

namespace App\Events;

use App\Http\Resources\ChatroomResource;
use App\Models\Chatroom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatroomCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Chatroom $chatroom;

    /**
     * Create a new event instance.
     */
    public function __construct(Chatroom $chatroom)
    {
        $this->chatroom = $chatroom;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('chatrooms');
    }

    public function broadcastAs(): string
    {
        return 'chatroom.created';
    }

    public function broadcastWith(): ChatroomResource
    {
        return new ChatroomResource($this->chatroom);
    }
}
