<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutVideoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_video_translations', function (Blueprint $table) {
            $table->id();
            $table->string('video');
            $table->string('locale')->index();
            $table->foreignId('about_video_id');
            $table->softDeletes();
            $table->foreign('about_video_id')->references('id')->on('about_videos')->onDelete('cascade');
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
        Schema::dropIfExists('about_video_translations');
    }
}
