<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class userCreated extends Event{
    use SerializesModels;

    public $user_id;
    public $make_admin;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_id, $make_admin){
        $this->user_id = $user_id;
        $this->make_admin = $make_admin;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn(){
        return [];
    }
}
