<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_translations', function (Blueprint $table) {
            $table->id();
            $table->text('desc');
            $table->string('locale')->index();
            $table->foreignId('regulation_id');
            $table->softDeletes();
            $table->foreign('regulation_id')->references('id')->on('regulations')->onDelete('cascade');
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
        Schema::dropIfExists('regulation_translations');
    }
}
