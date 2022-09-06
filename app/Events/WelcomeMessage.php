<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WelcomeMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    public $mailInfo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $mailInfo)
    {
         $this->data = $user;
         $this->mailInfo = $mailInfo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
