<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchSoundTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_sound_translations', function (Blueprint $table) {
            $table->id();
            $table->string('sound');
            $table->string('locale')->index();
            $table->foreignId('branch_sound_id');
            $table->softDeletes();
            $table->foreign('branch_sound_id')->references('id')->on('branch_sounds')->onDelete('cascade');
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
        Schema::dropIfExists('branch_sound_translations');
    }
}
