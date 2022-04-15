<?php

namespace Tomorrowxxy\AppleAds\Exceptions;

class InvalidMethodException extends Exception
{
    public function __construct($method)
    {
        parent::__construct(sprintf('AppleAds: Wrong request method [%s]', $method));
    }
}