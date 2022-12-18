<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ToolsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group( [
//     "prefix" => "{locale}",
//     "where" => [ "locale" => "en|fa" ],
//     "middleware" => "setLocale"
// ], function() {

// } );

Route::middleware( "setLocale" )
    ->where( [ "locale" => "fa|en" ] )
    ->prefix( "{locale}" )
    ->group( function() {
        
        Route::prefix( "user" )->group( function() {
            Route::post( "register", [ AuthController::class, "register" ] );
            Route::post( "login", [ AuthController::class, "login" ] );

            Route::middleware( 'auth:sanctum' )->group( function () {
                Route::get( "/", [ AuthController::class, "getUserData" ] );
                Route::post( "logout", [ AuthController::class, "logout" ] );
            });
        } );
        
        Route::prefix( "tools" )->middleware( 'auth:sanctum' )->group( function() {
            Route::get( "/", [ ToolsController::class, "index" ] );
            Route::get( "/list/{bookCode}", [ ToolsController::class, "listByArchive" ] );
            Route::get( "/{id}", [ ToolsController::class, "show" ] );

            Route::post( "/", [ ToolsController::class, "store" ] );
            Route::match( [ "put", "patch" ], "/{id}", [ ToolsController::class, "update" ] );
            Route::delete( "/{id}", [ ToolsController::class, "destroy" ] );
        } );
} );