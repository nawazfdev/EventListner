<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Test:Cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    
         

       
            $data=array('data'=>'Corn Testing');
            Mail::send('sendmail',  $data, function ($message) {
                $message->to('sardarnawaz122@gmail.com');
                $message->subject(' Crone Testing Mail Example');
            });
    }
}
