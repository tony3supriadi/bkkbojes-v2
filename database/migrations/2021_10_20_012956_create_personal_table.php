<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->nullable();
            $table->longText('photo')->nullable();
            $table->string('nama_depan', 64);
            $table->string('nama_belakang', 64)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir', 64)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat', 64)->nullable();
            $table->string('provinsi', 64)->nullable();
            $table->string('kabupaten', 64)->nullable();
            $table->string('kecamatan', 64)->nullable();
            $table->string('desa', 64)->nullable();
            $table->string('kodepos', 8)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('username', 64)->unique();
            $table->string('email', 128)->unique();
            $table->enum('jenis_akun', ['Siswa', 'Alumni', 'Umum'])->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('personal');
    }
}
