<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchVideoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_video_translations', function (Blueprint $table) {
            $table->id();
            $table->string('video');
            $table->string('locale')->index();
            $table->foreignId('branch_video_id');
            $table->softDeletes();
            $table->foreign('branch_video_id')->references('id')->on('branch_videos')->onDelete('cascade');
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
        Schema::dropIfExists('branch_video_translations');
    }
}
