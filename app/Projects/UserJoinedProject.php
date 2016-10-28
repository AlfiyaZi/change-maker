<?php

namespace App\Project;
// use App\Ev as Evt;
// use App\Events\Event;
use App\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Log;

class UserJoinedProject implements ShouldBroadcast
{
    use SerializesModels;
    public $user;
    public $evt;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Evt $event, User $user)
    {
        $this->user = $user;
        $this->evt  = $event;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['event.' . $this->evt->id];
    }
}
