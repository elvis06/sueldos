<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('apellido_pat',30)->nullable();
            $table->string('apellido_mat',30)->nullable();
            $table->string('apellido_casada',30)->nullable();
            $table->enum('tipo_doc',['CI','PAS','CEX']);
            $table->string('num_doc',20);
            $table->enum('ext_ci',['TARIJA','SANTA CRUZ','POTOSI','PANDO','ORURO','LA PAZ','COCHABAMBA','CHUQUISACA','BENI','EXTRANJERO']);
            $table->string('nacionalidad',30);
            $table->date('fecha_nac');
            $table->enum('sexo',['MASCULINO','FEMENINO']);
            $table->string('direccion',255)->nullable();
            $table->string('telefono',20)->nullable();
            $table->date('fecha_ingreso');
            $table->string('cargo',50);
            $table->enum('tipo_actividad',['EMPLEADO','OBRERO']);
            $table->decimal('haber_basico', 10, 2);
            $table->string('banco',30)->nullable();
            $table->string('nro_cuenta',30)->nullable();
            $table->string('entidad_afp',30)->nullable();
            $table->string('cua',30)->nullable();
            $table->string('cod_rciva',30)->nullable();
            $table->enum('novedad',['I','V','D']);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
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
        Schema::dropIfExists('empleados');
    }
}
