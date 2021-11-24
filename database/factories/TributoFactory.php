<?php

namespace Database\Factories;

use App\Models\Tributo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TributoFactory extends Factory
{
    protected $model = Tributo::class;

    public function definition()
    {
        return [
			'ingreso_neto' => $this->faker->name,
			'dos_salarios_min' => $this->faker->name,
			'base_imponible' => $this->faker->name,
			'impuesto_rciva' => $this->faker->name,
			'trece_dos_sal_min' => $this->faker->name,
			'imp_neto_rciva' => $this->faker->name,
			'formulario_c693' => $this->faker->name,
			'saldo_favor_fisco' => $this->faker->name,
			'saldo_favor_dep' => $this->faker->name,
			'saldo_ant_favor_dep' => $this->faker->name,
			'mant_valor' => $this->faker->name,
			'saldo_act' => $this->faker->name,
			'saldo_utilizado' => $this->faker->name,
			'retencion_rciva' => $this->faker->name,
			'siete_periodo_ant' => $this->faker->name,
			'formulario_c465' => $this->faker->name,
			'saldo_siete' => $this->faker->name,
			'pago_siete' => $this->faker->name,
			'impuesto_retenido' => $this->faker->name,
			'saldo_dep' => $this->faker->name,
			'saldo_siete_dep' => $this->faker->name,
			'empleado_id' => $this->faker->name,
			'planilla_id' => $this->faker->name,
			'sueldo_id' => $this->faker->name,
        ];
    }
}
