<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->date('mulai_sekolah')->nullable();
            $table->date('selesai_sekolah')->nullable();
            $table->boolean('masih_sekolah')->nullable()->default(false);
            $table->string('nama_sekolah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('program_studi')->nullable();
            $table->double('nilai_akhir', 4, 2)->nullable();
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
        Schema::dropIfExists('personal_pendidikan');
    }
}
