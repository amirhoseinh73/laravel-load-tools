<?php

namespace Tests\Unit;

use Tests\TestCase;

class AppStartTest extends TestCase
{
    /**
     * test default route
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get( "/fa" );
        $response->assertStatus( 200 );
    }
}