<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Stall;

class VisitorEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $stall;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Stall $stall) {
        $this->user = $user;
        $this->stall = $stall;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {
        return new PrivateChannel('channel-name');
    }
}
