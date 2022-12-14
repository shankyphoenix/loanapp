<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        \App\Events\WelcomeMessage::class => [
            \App\Listeners\SendMail::class,
        ],
        \App\Events\RequestedLoan::class => [
            \App\Listeners\SendMail::class,
        ],
        \App\Events\AdminRequestAction::class => [
            \App\Listeners\SendMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
       /* Event::listen('event.*', function ($eventName, array $data) {
            echo $eventName;
            die();
        });*/
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
