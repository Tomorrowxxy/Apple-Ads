<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Support\Config;

/**
 * Class SearchAds
 * @package Tomorrowxxy\AppleAds\Requests
 */
abstract class SearchAds implements SearchAdsInterface
{
    /**
     * @var Config
     */
    public $config;

    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    public function getBaseOptions()
    {
        return [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->config->get('access_token'),
                'X-AP-Context'  => 'orgId=' . $this->config->get('org_id'),
            ],
        ];
    }
}