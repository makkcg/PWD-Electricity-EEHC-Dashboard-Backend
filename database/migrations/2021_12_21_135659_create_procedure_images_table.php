<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('procedure_id');
            $table->foreignId('creator_id');
            $table->softDeletes();
            $table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
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
        Schema::dropIfExists('procedure_images');
    }
}
