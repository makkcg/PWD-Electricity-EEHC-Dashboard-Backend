<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('regulation_id');
            $table->foreignId('creator_id');
            $table->softDeletes();
            $table->foreign('regulation_id')->references('id')->on('regulations')->onDelete('cascade');
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
        Schema::dropIfExists('regulation_images');
    }
}
