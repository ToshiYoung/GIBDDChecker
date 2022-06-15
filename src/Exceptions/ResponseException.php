<?php

namespace TY\CarChecker\Exceptions;

use Exception;

/**
 *
 */
class ResponseException extends Exception
{
    /**
     * @param Exception $exception
     * @return static
     */
    public static function connectionError(Exception $exception): self
    {
        return new static(
            "connection failed. Reason: {$exception->getMessage()}",
            $exception->getCode(),
            $exception
        );
    }
}