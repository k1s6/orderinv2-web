<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class makananTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example()
    {
        $response = $this->getJson('/api/getProduct');
        // print_r($response->getContent());
        // Periksa status respons
        $response->assertStatus(200);
    }
}
