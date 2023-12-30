<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function checkApi(): void
    {
        Artisan::call('migrate');
        $response = $this->get(route('/settings/customers'));

        $response->assertStatus(200);
    }
}
