<?php

namespace PixellWeb\Monetico;

use Illuminate\Support\ServiceProvider;


class MoneticoServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addCustomConfigurationValues();
    }

    public function addCustomConfigurationValues()
    {
        // add filesystems.disks for the log viewer
        config([
            'logging.channels.'.config('monetico.logging_channel') => [
                'driver' => 'single',
                'path' => storage_path('logs/'.config('monetico.logging_channel').'.log'),
                'level' => 'debug',
            ]
        ]);

    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/monetico.php', 'monetico'
        );

    }
}
