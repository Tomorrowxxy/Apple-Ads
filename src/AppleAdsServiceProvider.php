<?php

namespace Tomorrowxxy\AppleAds;

class AppleAdsServiceProvider extends \Illuminate\Support\ServiceProvider implements \Illuminate\Contracts\Support\DeferrableProvider
{
    protected $defer = true;

    public function boot()
    {
        // TODO test & support Lumen

        $this->publishes([
            __DIR__ . '/config/appleAds.php' => config_path('config.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(AppleAds::class, function () {
            return new AppleAds(config('services.appleAds'));
        });

        $this->app->alias(AppleAds::class, 'AppleAds');
    }

    public function provides()
    {
        return [AppleAds::class, 'AppleAds'];
    }
}
