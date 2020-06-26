<?php

namespace App\Listeners;

use App\Events\VisitorEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;

class VisitorListener {
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VisitorEvent  $event
     * @return void
     */
    public function handle(VisitorEvent $event) {
        $data = [
            'user_id' => $event->user->id,
            'stall_id' => $event->stall->id,
            'visited_at' => Carbon::now()->today()
        ];
        
        
    }
}
