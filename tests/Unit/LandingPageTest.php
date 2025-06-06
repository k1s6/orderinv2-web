<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_landingPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
