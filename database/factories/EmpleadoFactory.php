<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellido_pat' => $this->faker->name,
			'apellido_mat' => $this->faker->name,
			'apellido_casada' => $this->faker->name,
			'tipo_doc' => $this->faker->name,
			'num_doc' => $this->faker->name,
			'ext_ci' => $this->faker->name,
			'nacionalidad' => $this->faker->name,
			'fecha_nac' => $this->faker->name,
			'sexo' => $this->faker->name,
			'direccion' => $this->faker->name,
			'telefono' => $this->faker->name,
			'fecha_ingreso' => $this->faker->name,
			'cargo' => $this->faker->name,
			'tipo_actividad' => $this->faker->name,
			'haber_basico' => $this->faker->name,
			'banco' => $this->faker->name,
			'nro_cuenta' => $this->faker->name,
			'entidad_afp' => $this->faker->name,
			'cua' => $this->faker->name,
			'cod_rciva' => $this->faker->name,
			'novedad' => $this->faker->name,
			'estado' => $this->faker->name,
			'empresa_id' => $this->faker->name,
        ];
    }
}
