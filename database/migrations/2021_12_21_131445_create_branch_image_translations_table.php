<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchImageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_image_translations', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('locale')->index();
            $table->foreignId('branch_image_id');
            $table->softDeletes();
            $table->foreign('branch_image_id')->references('id')->on('branch_images')->onDelete('cascade');
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
        Schema::dropIfExists('branch_image_translations');
    }
}
