<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

/**
 * Class GetAdGroupLevelReports
 * @package Tomorrowxxy\AppleAds\Requests
 * @see     https://developer.apple.com/documentation/apple_search_ads/get__ad_group-level_reports
 */
class GetAdGroupLevelReports implements SearchAdsInterface
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://api.searchads.apple.com/api/v4/reports/campaigns/{campaignId}/adgroups';

    public function execute(int $campaign_id, array $params)
    {

    }
}