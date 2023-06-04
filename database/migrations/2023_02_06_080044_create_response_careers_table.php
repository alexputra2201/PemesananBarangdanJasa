<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponseCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('career_id');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('cv');
            $table->string('berkas_lain')->nullable();
            $table->string('no_hp');
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
        Schema::dropIfExists('response_careers');
    }
}