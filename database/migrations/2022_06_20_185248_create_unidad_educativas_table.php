<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadEducativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_educativas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('turno');


            $table->foreignId('id_infraestructura_educativa')
                ->nullable()
                ->constrained('infraestructura_educativas')
                ->cascadeOnUpdate()
                ->nullOnDelete();


            $table->timestamps();

            $table->foreignId('id_distrito')
                ->nullable()
                ->constrained('distritos')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidad_educativas');
    }
}
