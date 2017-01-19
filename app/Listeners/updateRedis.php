<?php

namespace App\Listeners;

use App\Events\userActions;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Redis;

class updateRedis{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  userActions  $event
     * @return void
     */
    public function handle(userActions $event){
        Redis::del('paginate:'.$event->table);
    }
}
