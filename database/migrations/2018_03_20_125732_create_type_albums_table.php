<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_albums', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('album_id');
            $table->foreign('album_id')->references('id')->on('albums');

            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_albums');
    }
}
