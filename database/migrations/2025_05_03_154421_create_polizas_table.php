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
        Schema::create('Polizasphp', function (Blueprint $table) {
            $table->string('NumeroPoliza')->primary();
            $table->integer('TipoPolizaId');
            $table->string('CedulaAsegurado');
            $table->float('MontoAsegurado');
            $table->date('FechaVencimiento');
            $table->date('FechaEmision');
            $table->integer('CoberturaId');
            $table->integer('EstadoPolizaId');
            $table->float('Prima');
            $table->date('Periodo');
            $table->date('FechaInclusion');
            $table->integer('AseguradoraId');
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
        Schema::dropIfExists('Polizas');
    }
};
