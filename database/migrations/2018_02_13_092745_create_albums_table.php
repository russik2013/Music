<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('artist');
            $table->string('image')->nullable();
            $table->integer('year_of_release')->nullable();
            $table->string('tracklist')->nullable();
            $table->string('description')->nullable();
            $table->string('label')->nullable();
            $table->string('genre')->nullable();
            $table->string('quality')->nullable();
            $table->string('total_time')->nullable();
            $table->string('total_size')->nullable();
            $table->string('download_link')->nullable();
            $table->boolean('show_in_slider')->default(false);
            $table->string('big_image')->nullable();
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
        Schema::dropIfExists('albums');
    }
}
