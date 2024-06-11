<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationTranslationMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_translation_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regulation_translation_id');
            $table->string('desc_sound')->nullable();
            $table->string('desc_video')->nullable();
            $table->softDeletes();
            $table->foreign('regulation_translation_id')->references('id')->on('regulation_translations')->onDelete('cascade');
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
        Schema::dropIfExists('regulation_translation_media');
    }
}
