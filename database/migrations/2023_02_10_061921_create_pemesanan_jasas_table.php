<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananJasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_jasas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('jasa_id');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->text('deskripsi');
            $table->string('image')->nullable();
            $table->string('image_develop')->nullable();
            $table->string('bukti_transaksi')->nullable();
            $table->string('bukti_transaksi_pelunasan')->nullable();
            $table->string('penawaran')->nullable();
            $table->string('no_hp');
            $table->integer('dp')->nullable();
            $table->integer('total_harga')->nullable();
            $table->string('status')->default("Pending");
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
        Schema::dropIfExists('pemesanan_jasas');
    }
}