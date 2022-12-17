<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ToolsTest extends TestCase
{

    use RefreshDatabase;

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

    /**
     * Read list of tools test.
     *
     * @return void
     */
    public function test_tools_list()
    {
        //get token
        $token = $this->get_token_user_register();

        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->withToken( $token )
            ->get( "/api/fa/tools" );
        $response->assertStatus( 200 );

        $assertResponse = array( 'status', 'message', 'data' );
        $response->assertJsonStructure($assertResponse);
    }

    /**
     * Read list of tools by book code and page test.
     *
     * @return void
     */
    public function test_tools_list_by_book()
    {
        //get token
        $token = $this->get_token_user_register();

        $bookParams = "205";

        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->withToken( $token )
            ->get( "/api/fa/tools/$bookParams/" );
        $response->assertStatus( 200 );

        $assertResponse = array( 'status', 'message', 'data' );
        $response->assertJsonStructure($assertResponse);
    }

    /**
     * Read one speific tools test.
     *
     * @return void
     */
    public function test_tool_data_by_params()
    {
        //get token
        $token = $this->get_token_user_register();

        $id = random_int( 1, 100 );

        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->withToken( $token )
            ->get( "/api/fa/tools/$id" );
        $response->assertStatus( 200 );

        $assertResponse = array( 'status', 'message', 'data' );
        $response->assertJsonStructure($assertResponse);
    }

    /**
     * Create tools test.
     * 
     * @return void
     */
    public function test_tool_create()
    {
        //get token
        $token = $this->get_token_user_register();

        $data = array(
            "key"   => "3dphoto",
            "type"  => "2",
            "icon"  => "1",
            "collection" => "Mozaweb",
            "archive" => null, //not available for any book right now
            "width" => 690,
            "height" => 529,
        );

        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->withToken( $token )
            ->post( "/api/fa/tools", $data );
        $response->assertStatus( 201 );

        $data[ "created_at" ] = date( "Y-m-d H:i:s" );
        $data[ "updated_at" ] = date( "Y-m-d H:i:s" );
        $assertResponse = array( 'status', 'message', 'data' );
        $response->assertJsonStructure($assertResponse);
    }

    /**
     * Delete tools test.
     * 
     * @return void
     */
    public function test_tool_delete()
    {
        //get token
        $token = $this->get_token_user_register();

        $id = random_int( 1, 100 );

        $response = $this
            ->withHeader( "Accept", "application/json" )
            ->withToken( $token )
            ->delete( "/api/fa/tools/$id" );
        $response->assertStatus( 200 );

        $assertResponse = array(
            'status' => 'success',
			'message' => __( "message.delete", [ "item", "tool" ] ),
			'data' => []
        );
        $response->assertExactJson($assertResponse);
    }
}