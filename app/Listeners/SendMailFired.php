<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendMailFired
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
    public function handle(SendMail $event): void
    {
    //    $user= User::find($event->userId)->toArray();
    //    $user = User::find($event->userId)->first();

   

    $user = User::find($event->userId);

if ($user) {
    
    Mail::send('sendmail', ['user' => $user], function ($message) use ($user) {
        $message->to($user->email);
        $message->subject('Testing');
    });
    

} else {
    dd('user is not found');
    dd($user);
}

}
}