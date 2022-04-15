<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetSearchTermLevelWithinAnAdGroupReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get_search_term-level_within_an_ad_group_reports
 */
class GetSearchTermLevelWithinAnAdGroupReports extends SearchAds
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'POST https://api.searchads.apple.com/api/v4/reports/campaigns/%s/adgroups/%s/searchterms';

    public function execute(int $campaign_id, int $ad_group_id, array $params)
    {

    }
}