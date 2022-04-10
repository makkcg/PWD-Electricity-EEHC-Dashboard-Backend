<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTranslationMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_translation_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_translation_id');
            $table->string('title_sound')->nullable();
            $table->string('title_video')->nullable();
            $table->string('desc_sound')->nullable();
            $table->string('desc_video')->nullable();
            $table->softDeletes();
            $table->foreign('service_translation_id')->references('id')->on('service_translations')->onDelete('cascade');
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
        Schema::dropIfExists('service_translation_media');
    }
}
