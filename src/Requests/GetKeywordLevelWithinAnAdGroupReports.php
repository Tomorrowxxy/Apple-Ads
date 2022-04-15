<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetKeywordLevelWithinAnAdGroupReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_keyword-level_within_an_ad_group_reports
 */
class GetKeywordLevelWithinAnAdGroupReports implements SearchAdsInterface
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns/%s/adgroups/%s/keywords';

    public function execute(int $campaign_id, int $ad_group_id, array $params)
    {

    }
}