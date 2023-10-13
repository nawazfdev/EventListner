<?php

namespace App\Listeners;

use App\Events\PostEvent;
use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class NotifyUser
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
    public function handle(PostEvent $event): void
    {
    $user=User::get();
    foreach ($user as $key => $value) {
        // \Mail::to($value->email)->send(new UserMail($event->post));
        Mail::to('sardarnawaz122@gmail.com')->send(new UserMail($event->post));

    }
    }
}
