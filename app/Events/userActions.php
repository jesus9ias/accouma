<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class userActions extends Event{
    use SerializesModels;

    public $table;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($table){
        $this->table = $table;
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
