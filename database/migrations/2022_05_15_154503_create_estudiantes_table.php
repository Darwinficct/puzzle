<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Registro');
            $table->string('Nombre');
            $table->unsignedBigInteger('FAC');
            $table->string('FACULTAD');
            $table->string('CARRERA_NOMBRE');
            $table->string('LUGAR_VOTACION');
            $table->unsignedBigInteger('MESA');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
