<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp');
            $table->string('bank')->nullable();
            $table->string('kredit');
            $table->string('booking');
            $table->string('booking_fee');
            $table->string('syaratkpr');
            $table->string('formbtn')->nullable();
            $table->string('formaplikasikprmandiri')->nullable();
            $table->string('lampiranflppmandiri')->nullable();
            $table->string('suratPernyataanKPRmandiri')->nullable();
            $table->string('status')->default("Pending");
            // $table->string('deskripsi');
            $table->timestamp('tanggal')->nullable();
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
        Schema::dropIfExists('pemesanan_barangs');
    }
}