<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalPengalamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_pengalaman', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->date('mulai_bekerja')->nullable();
            $table->date('selesai_bekerja')->nullable();
            $table->boolean('masih_bekerja')->nullable()->default(false);
            $table->string('posisi_jabatan')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('bidang_industri')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
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
        Schema::dropIfExists('personal_pengalaman');
    }
}
