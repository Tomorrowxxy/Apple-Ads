<?php

namespace Tomorrowxxy\AppleAds;

use Tomorrowxxy\AppleAds\Exceptions\Exception;
use Tomorrowxxy\AppleAds\Exceptions\InvalidMethodException;
use Tomorrowxxy\AppleAds\Requests\OAuth;
use Tomorrowxxy\AppleAds\Requests\SearchAdsInterface;

/**
 * Class AppleAds
 * @package Tomorrowxxy\AppleAds
 * @method Requests\GetCampaignLevelReports getCampaignLevelReports($body)
 */
class AppleAds
{
    public $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        $application = $this->registerProvider($method);

        if (empty($this->config['access_token'])) {
            $this->getAccessToken();
        }

        return $application->execute(...$arguments);
    }

    /**
     * @param $method
     * @return SearchAdsInterface
     * @throws Exception
     */
    protected function registerProvider($method)
    {
        $method   = \ucfirst(\str_replace(['-', '_', ''], '', $method));
        $provider = __NAMESPACE__ . '\\Requests\\' . $method;

        if (!\class_exists($provider)) {
            throw new Exception(sprintf('AppleAds: Wrong request method "%s".', $method));
        }

        $provider = new $provider($this->config);
        if (!($provider instanceof SearchAdsInterface)) {
            throw new Exception(sprintf('AppleAds: Class "%s" must implements interface %s.', $method, SearchAdsInterface::class));
        }

        return $provider;
    }

    public function setAccessToken($access_token)
    {
        $this->config['access_token'] = $access_token;
    }

    /**
     * @return array|\Psr\Http\Message\ResponseInterface|string
     * @throws Exception
     */
    public function getAccessToken()
    {
        $result = (new OAuth())->createAccessToken($this->config);

        if (!\is_array($result) || empty($result['access_token'])) {
            throw new Exception('AppleAds: Failed to get Access Token');
        }

        $this->setAccessToken($result['access_token']);

        return $result;
    }
}