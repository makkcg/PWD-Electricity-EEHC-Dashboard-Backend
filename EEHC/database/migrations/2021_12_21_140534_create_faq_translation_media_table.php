<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTranslationMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_translation_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_translation_id');
            $table->string('q_and_a_sound')->nullable();
            $table->string('q_and_a_video')->nullable();
            $table->softDeletes();
            $table->foreign('faq_translation_id')->references('id')->on('faq_translations')->onDelete('cascade');
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
        Schema::dropIfExists('faq_translation_media');
    }
}
