<?php

namespace SachinKiranti\SparrowSms;

use Illuminate\Support\ServiceProvider;

class SparrowSmsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sparrow-sms.php' => config_path('sparrow-sms.php'),
        ], 'sparrow-sms');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sparrow-sms.php', 'sparrow-sms'
        );
    }

}