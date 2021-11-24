<?php

namespace Database\Factories;

use App\Models\Descuento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DescuentoFactory extends Factory
{
    protected $model = Descuento::class;

    public function definition()
    {
        return [
			'cuenta_prev' => $this->faker->name,
			'riesgo_comun' => $this->faker->name,
			'comision_afp' => $this->faker->name,
			'aporte_solidario' => $this->faker->name,
			'ap_nac_solidario' => $this->faker->name,
			'rc_iva' => $this->faker->name,
			'anticipos' => $this->faker->name,
			'desc' => $this->faker->name,
			'total_desc' => $this->faker->name,
			'empleado_id' => $this->faker->name,
			'tributo_id' => $this->faker->name,
			'sueldo_id' => $this->faker->name,
        ];
    }
}
