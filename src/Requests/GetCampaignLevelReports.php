<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetCampaignLevelReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_campaign-level_reports
 */
class GetCampaignLevelReports implements SearchAdsInterface
{
    use HasHttpRequest;

    public $config;
    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns';

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function execute($params)
    {
        return $this->postJson(self::ENDPOINT_URL, $params);
    }
}