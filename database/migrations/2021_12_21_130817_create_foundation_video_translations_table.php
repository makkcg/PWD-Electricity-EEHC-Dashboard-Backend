<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationVideoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_video_translations', function (Blueprint $table) {
            $table->id();
            $table->string('video');
            $table->string('locale')->index();
            $table->foreignId('foundation_video_id');
            $table->softDeletes();
            $table->foreign('foundation_video_id')->references('id')->on('foundation_videos')->onDelete('cascade');
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
        Schema::dropIfExists('foundation_video_translations');
    }
}
