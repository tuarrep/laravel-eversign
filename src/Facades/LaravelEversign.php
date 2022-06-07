<?php

namespace Pinpon\LaravelEversign\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Pinpon\LaravelEversign\LaravelEversign
 */
class LaravelEversign extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-eversign';
    }
}
