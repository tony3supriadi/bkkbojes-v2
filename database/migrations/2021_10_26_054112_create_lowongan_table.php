<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->bigInteger('mitra_id')->nullable();
            $table->string('tipe_pekerjaan')->nullable(); // Full Time, Part Time, Freelance
            $table->json('program_studi')->nullable(); // [Miltimedia, Rekayasa Pengkar Lunak]
            $table->string('kisaran_gaji')->nullable();
            $table->boolean('tampilkan_gaji')->nullable()->default(false);
            $table->longText('deskripsi')->nullable();
            $table->longText('kualifikasi')->nullable();
            $table->longText('benefit')->nullable();
            $table->longText('catatan')->nullable();
            $table->date('tanggal_berakhir')->nullable();
            $table->integer('counter')->default(0);
            $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('lowongan');
    }
}
