<?php

namespace TY\CarChecker\Gibdd;

use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Exceptions\ResponseException;

class Restricted extends Api
{
    protected string $method = 'restrict';

    /**
     * @throws GuzzleException
     * @throws ResponseException
     */
    public function data(): array
    {
        return $this->request('restricted');
    }
}