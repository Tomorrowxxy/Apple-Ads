<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Firebase\JWT\JWT;
use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

class OAuth extends SearchAds
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://appleid.apple.com/auth/oauth2/token';

    public function createAccessToken()
    {
        $params = [
            'client_id'     => $this->config->get('client_id'),
            'client_secret' => $this->_createJwt(),
            'grant_type'    => 'client_credentials',
            'scope'         => 'searchadsorg',
        ];

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Host'         => 'appleid.apple.com',
        ];

        return $this->execute($params, $headers);
    }

    private function _createJwt()
    {
        $headers = [
            'alg' => $this->config->get('alg'),
            'kid' => $this->config->get('key_id'),
        ];

        $issued_at_timestamp  = \time();
        $expiration_timestamp = $issued_at_timestamp + 86400 * 180;

        $payload = [
            'sub' => $this->config->get('client_id'),
            'aud' => $this->config->get('audience'),
            'iat' => $issued_at_timestamp,
            'exp' => $expiration_timestamp,
            'iss' => $this->config->get('team_id'),
        ];

        return JWT::encode($payload, $this->config->get('private_key'), $this->config->get('alg'), null, $headers);
    }

    public function execute($params, $headers)
    {
        return $this->post(self::ENDPOINT_URL, $params, $headers);
    }
}