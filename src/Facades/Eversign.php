<?php

namespace Pinpon\Eversign\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pinpon\Eversign\Eversign
 */
class Eversign extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'eversign';
    }
}
