<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Steno983\EmailHint\EmailHintServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            EmailHintServiceProvider::class,
        ];
    }
}
