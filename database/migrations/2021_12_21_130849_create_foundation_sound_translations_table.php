<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationSoundTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_sound_translations', function (Blueprint $table) {
            $table->id();
            $table->string('sound');
            $table->string('locale')->index();
            $table->foreignId('foundation_sound_id');
            $table->softDeletes();
            $table->foreign('foundation_sound_id')->references('id')->on('foundation_sounds')->onDelete('cascade');
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
        Schema::dropIfExists('foundation_sound_translations');
    }
}
