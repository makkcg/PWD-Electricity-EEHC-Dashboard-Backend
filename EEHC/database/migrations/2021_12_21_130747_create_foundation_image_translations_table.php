<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundationImageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_image_translations', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('locale')->index();
            $table->foreignId('foundation_image_id');
            $table->softDeletes();
            $table->foreign('foundation_image_id')->references('id')->on('foundation_images')->onDelete('cascade');
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
        Schema::dropIfExists('foundation_image_translations');
    }
}
