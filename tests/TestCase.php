<?php

namespace Tests;

use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase {

    use CreatesApplication, DatabaseMigrations, WithFaker;

    public function setUp(): void {
        parent::setUp();
        Artisan::call('migrate:refresh --seed');
    }

}
