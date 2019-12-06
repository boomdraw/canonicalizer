<?php

namespace Boomdraw\Canonicalizer\Tests;

use Boomdraw\Canonicalizer\CanonicalizerServiceProvider;
use Boomdraw\Canonicalizer\Facades\Canonicalizer as CanonicalizerFacade;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * Load package service provider.
     *
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            CanonicalizerServiceProvider::class,
        ];
    }

    /**
     * Load package alias.
     *
     * @param Application $app
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Canonicalizer' => CanonicalizerFacade::class,
        ];
    }
}
