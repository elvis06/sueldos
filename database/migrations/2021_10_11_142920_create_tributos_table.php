<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTributosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tributos', function (Blueprint $table) {
            $table->id();
            $table->decimal('ingreso_neto', 10, 2);
            $table->decimal('dos_salarios_min', 10, 2);
            $table->decimal('base_imponible', 10, 2);
            $table->decimal('impuesto_rciva', 10, 2);
            $table->decimal('trece_dos_sal_min', 10, 2);
            $table->decimal('imp_neto_rciva', 10, 2);
            $table->decimal('formulario_c693', 10, 2);
            $table->decimal('saldo_favor_fisco', 10, 2);
            $table->decimal('saldo_favor_dep', 10, 2);
            $table->decimal('saldo_ant_favor_dep', 10, 2);
            $table->decimal('mant_valor', 10, 2);
            $table->decimal('saldo_act', 10, 2);
            $table->decimal('saldo_utilizado', 10, 2);
            $table->decimal('retencion_rciva', 10, 2);
            $table->decimal('siete_periodo_ant', 10, 2);
            $table->decimal('formulario_c465', 10, 2);
            $table->decimal('saldo_siete', 10, 2);
            $table->decimal('pago_siete', 10, 2);
            $table->decimal('impuesto_retenido', 10, 2);
            $table->decimal('saldo_dep', 10, 2);
            $table->decimal('saldo_siete_dep', 10, 2);
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('planilla_id');
            $table->foreign('planilla_id')->references('id')->on('planillas')->onDelete('cascade');
            $table->unsignedBigInteger('sueldo_id');
            $table->foreign('sueldo_id')->references('id')->on('sueldos')->onDelete('cascade');
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
        Schema::dropIfExists('tributos');
    }
}
