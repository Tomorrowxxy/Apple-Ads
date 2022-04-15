<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetCreativeSetLevelReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_creative_set-level_reports
 */
class GetCreativeSetLevelReports implements SearchAdsInterface
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns/%s/creativesets';

    public function execute(int $campaign_id, array $params)
    {

    }
}