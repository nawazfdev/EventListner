<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\mail\mailjob;
use Illuminate\Support\Facades\Mail;
class sendemailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
protected $sendmail;
    /**
     * Create a new job instance.
     */
    public function __construct($sendmail)
    {
        $this->sendmail= $sendmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email= new mailjob();
        Mail::to($this->sendmail)->send($email);

    }
}
