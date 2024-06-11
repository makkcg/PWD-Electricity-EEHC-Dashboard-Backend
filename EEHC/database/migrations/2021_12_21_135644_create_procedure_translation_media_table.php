<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureTranslationMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_translation_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procedure_translation_id');
            $table->string('desc_sound')->nullable();
            $table->string('desc_video')->nullable();
            $table->softDeletes();
            $table->foreign('procedure_translation_id')->references('id')->on('procedure_translations')->onDelete('cascade');
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
        Schema::dropIfExists('procedure_translation_media');
    }
}
