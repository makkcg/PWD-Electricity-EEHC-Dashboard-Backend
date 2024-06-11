<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedure_translations', function (Blueprint $table) {
            $table->id();
            $table->text('desc');
            $table->string('locale')->index();
            $table->foreignId('procedure_id');
            $table->softDeletes();
            $table->foreign('procedure_id')->references('id')->on('procedures')->onDelete('cascade');
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
        Schema::dropIfExists('procedure_translations');
    }
}
