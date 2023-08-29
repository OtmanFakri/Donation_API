<?php

namespace App\Providers;

use App\Events\ConfurmOrderByCustumer;
use App\Events\ConfurmOrderByOwner;
use App\Listeners\ListnerConfurmOrderByCustumer;
use App\Listeners\ListnerConfurmOrderByOwner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ConfurmOrderByCustumer::class => [
            ListnerConfurmOrderByCustumer::class,
        ],

        ConfurmOrderByOwner::class=>[
            ListnerConfurmOrderByOwner::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
