<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Unit\AuthTest as UnitAuthTest;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login feature.
     * first register, then logout, in the end login.
     *
     * @return void
     */

    public function test_user_register_then_login()
    {
        //get token
        $token = $this->get_token_user_register();

        //check logout
        $responseLogout = $this
                ->withToken( $token )
                ->post( "/api/fa/user/logout" );
        $responseLogout->assertStatus( 200 );

        //check login
        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->post( "/api/fa/user/login", array(
                "username"  => "0016973178",
                "password"  => "123456"
            ) );
        $response->assertStatus( 202 );
    }

    public function get_token_user_register() {
        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->post( "/api/fa/user/register", array(
                "firstname" => "amirhossein",
                "lastname"  => "hassani",
                "username"  => "0016973178",
                "mobile"    => "09376885515",
                "gender"    => "male",
                "password"  => "123456",
                "password_confirmation" => "123456"
            ) );

        //get token
        $token = $response->decodeResponseJson()[ "data" ][ "token" ];

        return $token;
    }
}
