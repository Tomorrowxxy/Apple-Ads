<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetAdLevelReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_ad-level_reports
 */
class GetAdLevelReports implements SearchAdsInterface
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns/%s/ads';

    public function execute(int $campaign_id, array $params)
    {

    }
}