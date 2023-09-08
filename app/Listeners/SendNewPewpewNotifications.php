<?php

namespace App\Listeners;

use App\Events\PewpewCreated;
use App\Models\User;
use App\Notifications\NewPewpew;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewPewpewNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PewpewCreated $event): void
    {
        foreach (User::whereNot('id', $event->pewpew->user_id)->cursor() as $user) {
            $user->notify(new NewPewpew($event->pewpew));
        }
    }
}
