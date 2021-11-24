<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSueldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sueldos', function (Blueprint $table) {
            $table->id();
            $table->integer('antiguedad');
            $table->integer('dias_habiles');
            $table->integer('dias_trab');
            $table->decimal('haber_ganado', 10, 2);
            $table->integer('porcentaje_ant');
            $table->decimal('bono_antiguedad', 10, 2);
            $table->integer('dias_dom');
            $table->decimal('dominicales', 10, 2);
            $table->integer('horas_extra');
            $table->decimal('importe_hrs_extra', 10, 2);
            $table->integer('horas_noc');
            $table->decimal('importe_hrs_noc', 10, 2);
            $table->integer('horas_dom_fer');
            $table->decimal('importe_dom_fer', 10, 2);
            $table->decimal('subsidio_frontera', 10, 2);
            $table->decimal('otro_ingreso', 10, 2);
            $table->decimal('total_ganado', 10, 2);

            $table->decimal('cuenta_prev', 10, 2);
            $table->decimal('riesgo_comun', 10, 2);
            $table->decimal('comision_afp', 10, 2);
            $table->decimal('aporte_solidario', 10, 2);
            $table->decimal('ap_nac_solidario', 10, 2);
            $table->decimal('rc_iva', 10, 2);
            $table->decimal('anticipos', 10, 2);
            $table->decimal('descuentos', 10, 2);
            $table->decimal('total_desc', 10, 2);

            $table->decimal('liq_pagable', 10, 2);
            
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('planilla_id');
            $table->foreign('planilla_id')->references('id')->on('planillas')->onDelete('cascade');
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
        Schema::dropIfExists('sueldos');
    }
}
