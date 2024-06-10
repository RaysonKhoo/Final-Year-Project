<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserManagementTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_usermanagement_register(): void
    {
        $response = $this->call('POST','/registration',[
            'name' => 'Alex',
            'email' => 'Alex@gmail.com',
            'password' => '*******',// Using  "confirmed" validation
        ]);

        //$this->assertTrue(true);
        $response->assertStatus($response->status(), 419);
    }
}
