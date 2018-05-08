<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Events\Dispatcher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package App\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /** @var Dispatcher */
    protected $event;

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    public function __construct(Application $app)
    {
        $this->event = new Dispatcher($app);
        parent::__construct($app);
    }

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->listens() as $event => $listeners) {
            foreach ($listeners as $listener) {
                $this->event->listen($event, $listener);
            }
        }

        foreach ($this->subscribe as $subscriber) {
            $this->event->subscribe($subscriber);
        }
    }
}
