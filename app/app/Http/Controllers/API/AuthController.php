<?php

namespace App\Http\Controllers\API;

use App\Helpers\Types;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\usernameFormatIranNationalCode;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Schema;

class AuthController extends Controller
{
    use ResponseAPI;

    public function register( Request $request ) {
        // return Schema::getColumnListing( "users" );
        $params = $request->validate( array(
            "firstname" => "required|string",
            "lastname"  => "required|string",
            "username"  => ["required", "digits:10", "unique:users,username", "bail", new usernameFormatIranNationalCode],
            "mobile"    => "required|digits:11|starts_with:09|bail",
            "gender"    => "required|string|in:". Types::GENDER ."|bail",
            "password"  => "required|string|min:6|confirmed|bail"
        ) );

        $params[ "password" ] = bcrypt( $params[ "password" ] );
        $params[ "gender" ] = Types::getGenderBool( $params[ "gender" ] );
        try {
            $user = User::create( $params );
        } catch( Exception $e ) {
            return $this->error( __( "message.Auth.failedRegister" ), 500, $e );
        }

        $token = $user->createToken( APP_TOKEN_NAME )->plainTextToken;

        $response = array(
            "user" => $user,
            "token" => $token
        );

        return $this->success( $response, __( "message.Auth.register" ), 201 );
    }

    public function login( Request $request ) {
        $params = $request->validate( array(
            "username"  => "required|digits:10",
            "password"  => "required|string|Min:6"
        ) );

        //check username
        $user = User::where( "username", $params[ "username" ] )->first();

        //check password
        if ( ! exist( $user ) || ! Hash::check( $params[ "password" ], $user->password ) ) {
            return $this->error( __( "message.Auth.failedLogin" ), 401 );
        }

        $token = $user->createToken( APP_TOKEN_NAME )->plainTextToken;

        $response = array(
            "user" => $user,
            "token" => $token
        );

        return $this->success( $response, __( "message.Auth.login" ), 202 );
    }

    public function logout() {

        // auth()->user()->tokens()->delete();

        $user = request()->user();
        $user->tokens()->delete();

        return $this->success( "", __( "message.Auth.logout" ), 200 );
    }

    public function getUserData() {
        return request()->user();
    }
}