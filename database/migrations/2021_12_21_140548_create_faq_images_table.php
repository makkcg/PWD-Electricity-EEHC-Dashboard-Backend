<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->foreignId('faq_id');
            $table->foreignId('creator_id');
            $table->softDeletes();
            $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
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
        Schema::dropIfExists('faq_images');
    }
}
