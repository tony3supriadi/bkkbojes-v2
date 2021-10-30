<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalOrganisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_organisasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->date('mulai_menjabat')->nullable();
            $table->date('selesai_menjabat')->nullable();
            $table->boolean('masih_menjabat')->nullable()->default(false);
            $table->string('posisi_jabatan')->nullable();
            $table->string('nama_organisasi')->nullable();
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
        Schema::dropIfExists('personal_organisasi');
    }
}
