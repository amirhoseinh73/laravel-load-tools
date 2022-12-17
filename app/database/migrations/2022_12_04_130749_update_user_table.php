<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table( "users", function( Blueprint $table ) {
            $table->renameColumn( "name", "firstname" );
            $table->string( "email", 10 )->change();
            $table->renameColumn( "email", "username" );
            $table->removeColumn( "email_verified_at" );
            $table->timestamp( "deleted_at" )->nullable();
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
