<?php

namespace App\Providers;

use App\Jobs\PingJob;
use App\Jobs\ProductCreatedJob;
use App\Jobs\ProductUpdatedJob;
use App\Jobs\ProductDeletedJob;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        App::bindMethod(PingJob::class . '@handle', function ($job) {
            return $job->handle();
        });
        App::bindMethod(ProductCreatedJob::class . '@handle', function ($job) {
            return $job->handle();
        });
        App::bindMethod(ProductUpdatedJob::class . '@handle', function ($job) {
            return $job->handle();
        });
        App::bindMethod(ProductDeletedJob::class . '@handle', function ($job) {
            return $job->handle();
        });
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
