<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalKeterampilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_keterampilan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->string('keterampilan')->nullable();
            $table->enum('level', ['Mahir', 'Menengah', 'Pemula'])->default('Mahir')->nullable();
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
        Schema::dropIfExists('personal_keterampilan');
    }
}
