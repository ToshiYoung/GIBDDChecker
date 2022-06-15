<?php

namespace TY\CarChecker\Gibdd;

use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Exceptions\ResponseException;

class History extends Api
{
    protected string $method = 'history';

    /**
     * @throws GuzzleException
     * @throws ResponseException
     */
    public function data(): array
    {
        return $this->request('history');
    }
}