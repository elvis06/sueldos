<?php

namespace Database\Factories;

use App\Models\Planilla;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlanillaFactory extends Factory
{
    protected $model = Planilla::class;

    public function definition()
    {
        return [
			'gestion' => $this->faker->name,
			'mes' => $this->faker->name,
			'sueldo_min' => $this->faker->name,
			'domingos' => $this->faker->name,
			'feriados' => $this->faker->name,
			'ultimo_dia' => $this->faker->name,
			'estado' => $this->faker->name,
			'empresa_id' => $this->faker->name,
        ];
    }
}
