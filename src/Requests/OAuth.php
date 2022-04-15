<?php

namespace Tomorrowxxy\AppleAds\Requests;

use Firebase\JWT\JWT;
use Tomorrowxxy\AppleAds\Traits\HasHttpRequest;

class OAuth
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'https://appleid.apple.com/auth/oauth2/token';

    public function createAccessToken($config)
    {
        $params = [
            'client_id'     => $config['client_id'],
            'client_secret' => $this->_createJwt($config),
            'grant_type'    => 'client_credentials',
            'scope'         => 'searchadsorg',
        ];

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Host'         => 'appleid.apple.com',
        ];

        return $this->post(self::ENDPOINT_URL, $params, $headers);
    }

    private function _createJwt($config)
    {
        $headers = [
            'alg' => $config['alg'],
            'kid' => $config['key_id'],
        ];

        $issued_at_timestamp  = \time();
        $expiration_timestamp = $issued_at_timestamp + 86400 * 180;

        $payload = [
            'sub' => $config['client_id'],
            'aud' => $config['audience'],
            'iat' => $issued_at_timestamp,
            'exp' => $expiration_timestamp,
            'iss' => $config['team_id'],
        ];

        return JWT::encode($payload, $config['private_key'], $config['alg'], null, $headers);
    }
}