<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->string( "key", 30 )->unique();
            $table->tinyInteger( "type" ); // 1: creator tools, 2: viewer tools, 3: games
            $table->string( "icon", 20 )->nullable();
            $table->string( "collection", 20 )->nullable();
            $table->string( "archive" )->nullable();
            $table->smallInteger( "width" )->nullable();
            $table->smallInteger( "height" )->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tools');
    }
}
