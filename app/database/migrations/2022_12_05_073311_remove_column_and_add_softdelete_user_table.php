<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnAndAddSoftdeleteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( "users", function( Blueprint $table ) {
            $table->dropColumn( "email_verified_at" );
            $table->dropColumn( "deleted_at" );
        } );
        Schema::table( "users", function( Blueprint $table ) {
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
