<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $username,
        public string $message = '',
        public string $date,
        public string $image,
        public string $audio,
        public bool $read,
        public string $uuid
    )

    {

    }

    public function broadcastOn(): array
    {
        return ['chat'];
    }

    public function broadcastAs() {
        return 'message';
    }
}
