<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foundation_id');
            $table->foreignId('city_id');
            $table->foreignId('creator_id');
            $table->string('map');
            $table->tinyInteger('pwd_status');
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('landline1')->nullable();
            $table->string('landline2')->nullable();
            $table->string('email');
            $table->softDeletes();
            $table->foreign('foundation_id')->references('id')->on('foundations')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('branches');
    }
}
