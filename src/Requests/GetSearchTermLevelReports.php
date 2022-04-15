<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetSearchTermLevelReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_search_term-level_reports
 */
class GetSearchTermLevelReports implements SearchAdsInterface
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns/%s/searchterms';

    public function execute(int $campaign_id, array $params)
    {

    }
}