<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if($event instanceof \App\Events\WelcomeMessage) {            

            Mail::to($event->data['mail_info']['to'])->send(new \App\Mail\WelcomeMessage($event->data));

        }
        if($event instanceof \App\Events\RequestedLoan) {                     

            Mail::to($event->data['mail_info']['to'])->send(new \App\Mail\RequestLoan($event->data));

        }
        if($event instanceof \App\Events\AdminRequestAction) {            

            Mail::to($event->data['mail_info']['to'])->send(new \App\Mail\AdminRequestAction($event->data));
            
        }
    }
}
