<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Support\Config;

/**
 * Interface SearchAdsInterface
 * @package Tomorrowxxy\AppleAds\Requests
 *
 * @method execute(...$params)
 */
interface SearchAdsInterface
{
    public function setConfig(Config $config);
}