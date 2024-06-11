<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutSoundTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_sound_translations', function (Blueprint $table) {
            $table->id();
            $table->string('sound');
            $table->string('locale')->index();
            $table->foreignId('about_sound_id');
            $table->softDeletes();
            $table->foreign('about_sound_id')->references('id')->on('about_sounds')->onDelete('cascade');
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
        Schema::dropIfExists('about_sound_translations');
    }
}
