<?php

namespace Bpocallaghan\Subscriptions;

use Illuminate\Support\ServiceProvider;
use Bpocallaghan\Subscriptions\Commands\PublishCommand;

class SubscriptionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/admin', 'admin.subscriptions');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/website', 'website.subscriptions');

        $this->registerCommand(PublishCommand::class, 'publish');
    }

    /**
     * Register a singleton command
     *
     * @param $class
     * @param $command
     */
    private function registerCommand($class, $command)
    {
        $path = 'bpocallaghan.subscriptions.commands.';
        $this->app->singleton($path . $command, function ($app) use ($class) {
            return $app[$class];
        });

        $this->commands($path . $command);
    }
}
