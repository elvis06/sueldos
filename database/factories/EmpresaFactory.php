<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'propietario' => $this->faker->name,
			'nit' => $this->faker->name,
			'direccion' => $this->faker->name,
			'telefono' => $this->faker->name,
			'ciudad' => $this->faker->name,
			'representante' => $this->faker->name,
			'ci_representante' => $this->faker->name,
			'tel_representante' => $this->faker->name,
			'nro_min_trabajo' => $this->faker->name,
			'nro_caja_salud' => $this->faker->name,
			'lucro' => $this->faker->name,
			'rubro' => $this->faker->name,
			'tipo' => $this->faker->name,
			'estado' => $this->faker->name,
        ];
    }
}
