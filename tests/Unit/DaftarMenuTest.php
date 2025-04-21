<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DaftarMenuTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_daftarmenu(): void
    {
        $response = $this->get('/');
        
        $response = $this->post('/landingpage/validate', [
            'nama' => 'alka'
        ]);
        
        $response = $this->get('/daftarmenu');
        // $response->assertRedirect('/daftarmenu');

        // $response->assertSessionHas('nama', 'alka');

        $response->assertStatus(200);
    }
}
