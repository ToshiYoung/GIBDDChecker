<?php

namespace TY\CarChecker\Gibdd;

use GuzzleHttp\Exception\GuzzleException;
use TY\CarChecker\Exceptions\ResponseException;

class Wanted extends Api
{
    protected string $method = 'wanted';

    /**
     * @throws GuzzleException
     * @throws ResponseException
     */
    public function data(): array
    {
        return $this->request('wanted');
    }
}