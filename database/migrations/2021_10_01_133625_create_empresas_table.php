<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('propietario',100)->nullable();
            $table->string('nit',20);
            $table->string('direccion',255);
            $table->string('telefono',40);
            $table->string('ciudad',50);
            $table->string('representante',100);
            $table->string('ci_representante',20)->nullable();
            $table->string('tel_representante',20)->nullable();
            $table->string('nro_min_trabajo',50)->nullable();
            $table->string('nro_caja_salud',50)->nullable();
            $table->enum('lucro',['SI','NO'])->default('SI');
            $table->enum('rubro',['COMERCIAL','INDUSTRIAL','SERVICIOS','CONSTRUCCIÓN','EDUCACIÓN','OTRO']);
            $table->enum('tipo',['UNIPERSONAL','S.R.L.','S.A.','S.A.M.','S.C.','S.C.S.','S.C.A.']);
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('empresas');
    }
}
