<?php
/**
 * This file is part of TravisNguyen\MessageHub package.
 *
 * (c) Travis Nguyen <travisnguyen.me@gmail.com> <www.travisnguyen.me>
 */
namespace TravisNguyen\MessageHub;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class MessageHubServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // config
        $this->publishes([
            __DIR__ . '/config/message-hub.php' => config_path('message-hub.php')
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMessageHub($this->app);

        // configurations
        $this->mergeConfigFrom(
            __DIR__ . '/config/message-hub.php', 'message-hub'
        );
    }

    /**
     * Register the user verification.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    protected function registerMessageHub(Application $app)
    {
        $app->bind('message.hub', function ($app) {
            return new MessageHub();
        });

        $app->alias('message.hub', MessageHub::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            'message.hub',
        ];
    }
}
