<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * test default route
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get( "/" );
        $response->assertStatus( 200 );
    }
}