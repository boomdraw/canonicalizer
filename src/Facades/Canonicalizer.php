<?php

namespace Boomdraw\Canonicalizer\Facades;

use Boomdraw\Canonicalizer\Contracts\Canonicalizer as CanonicalizerContract;
use Illuminate\Support\Facades\Facade;

class Canonicalizer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CanonicalizerContract::class;
    }
}
