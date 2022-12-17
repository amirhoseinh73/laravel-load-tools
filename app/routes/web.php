<?php

use App\Http\Controllers\ToolsViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect( "/", "fa" );

Route::middleware( "setLocale" )
    ->where( [ "locale" => "fa|en" ] )
    ->prefix( "{locale}" )
    ->group( function() {

        Route::get( '/', [ ToolsViewController::class, 'index' ] );

        Route::prefix( "tools" )->middleware( 'auth:sanctum' )->group( function() { //->middleware( 'auth:sanctum' )
            Route::get( "load/{id}", [ ToolsViewController::class, "load" ] );
        } );

} );