<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArabicDictionaryFoundationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arabic_dictionary_foundations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foundation_id');
            $table->foreign('foundation_id')->references('id')->on('foundations')->onDelete('cascade');
            $table->foreignId('arabic_dictionary_id');
            $table->foreign('arabic_dictionary_id')->references('id')->on('arabic_dictionaries')->onDelete('cascade');
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
        Schema::dropIfExists('arabic_dictionary_foundations');
    }
}
