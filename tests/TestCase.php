<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp()
    {
        parent::setUp();
        $this->prepareForTests();
    }
    private function prepareForTests()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    public function tearDown()
    {
        parent::tearDown();
    }
}
