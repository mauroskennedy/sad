<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->integer('carnet')->nullable();
            $table->integer('celular')->nullable();
            $table->timestamps();

            $table->foreignId('id_urbanizacion')
            ->nullable()
            ->constrained('urbanizacions')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            
            $table->foreignId('id_cargo')
            ->nullable()
            ->constrained('cargos')
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
        Schema::dropIfExists('representantes');
    }
}
