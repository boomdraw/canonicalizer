<?php

namespace Boomdraw\Canonicalizer;

use Boomdraw\Canonicalizer\Contracts\Canonicalizer as CanonicalizerContract;
use Boomdraw\Canonicalizer\Repositories\Canonicalizer;
use Illuminate\Support\ServiceProvider;

class CanonicalizerServiceProvider extends ServiceProvider
{
    /**
     * Register the exchanger services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CanonicalizerContract::class, Canonicalizer::class);
    }
}
