<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('logo')->nullable();
            $table->string('slug')->unique();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('bidang_usaha')->nullable();
            $table->string('badan_usaha')->nullable(); // BUMN, Swasta, Asing
            $table->string('bentuk_usaha')->nullable(); // PT, CV, UD
            $table->string('jumlah_karyawan')->nullable();
            $table->string('waktu_kerja')->nullable();
            $table->string('busana_kerja')->nullable();
            $table->text('kontak')->nullable();
            $table->string('telephone', 16)->nullable();
            $table->string('email')->nullable();
            $table->string('faxmail')->nullable();
            $table->string('website')->nullable();
            $table->longText('profile_perusahaan')->nullable();
            $table->boolean('mitra_unggulan')->default(false);
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
        Schema::dropIfExists('mitra');
    }
}
