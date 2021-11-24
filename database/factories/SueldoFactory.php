<?php

namespace Database\Factories;

use App\Models\Sueldo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SueldoFactory extends Factory
{
    protected $model = Sueldo::class;

    public function definition()
    {
        return [
			'antiguedad' => $this->faker->name,
			'dias_habiles' => $this->faker->name,
			'dias_trab' => $this->faker->name,
			'haber_ganado' => $this->faker->name,
			'porcentaje_ant' => $this->faker->name,
			'bono_antiguedad' => $this->faker->name,
			'dias_dom' => $this->faker->name,
			'dominicales' => $this->faker->name,
			'horas_extra' => $this->faker->name,
			'importe_hrs_extra' => $this->faker->name,
			'horas_noc' => $this->faker->name,
			'importe_hrs_noc' => $this->faker->name,
			'horas_dom_fer' => $this->faker->name,
			'importe_dom_fer' => $this->faker->name,
			'subsidio_frontera' => $this->faker->name,
			'otro_ingreso' => $this->faker->name,
			'total_ganado' => $this->faker->name,
			'liq_pagable' => $this->faker->name,
			'estado' => $this->faker->name,
			'empleado_id' => $this->faker->name,
			'planilla_id' => $this->faker->name,
        ];
    }
}
