<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test register route
     *
     * @return void
     */
    public function test_route_user_register()
    {
        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->post( "/api/fa/user/register" );
        $response->assertStatus( 422 );
    }

    /**
     * test register
     *
     * @return string
     */
    public function test_user_register()
    {
        //check register
        $response = $this->user_register();
        $response->assertStatus( 201 );
    }

    public function user_register() {
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

        return $response;
    }

    public function get_token_user_register() {
        $response = $this->user_register();

        //get token
        $token = $response->decodeResponseJson()[ "data" ][ "token" ];

        return $token;
    }

    /**
     * test login route
     *
     * @return void
     */
    public function test_route_user_login()
    {
        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->post( "/api/fa/user/login" );
        $response->assertStatus( 422 );
    }
}
