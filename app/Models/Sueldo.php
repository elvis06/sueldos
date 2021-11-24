<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sueldo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sueldos';

    protected $fillable = ['antiguedad','dias_habiles','dias_trab','haber_ganado','porcentaje_ant','bono_antiguedad','dias_dom','dominicales','horas_extra','importe_hrs_extra','horas_noc','importe_hrs_noc','horas_dom_fer','importe_dom_fer','subsidio_frontera','otro_ingreso','total_ganado','cuenta_prev','riesgo_comun','comision_afp','aporte_solidario','ap_nac_solidario','rc_iva','anticipos','descuentos','total_desc','liq_pagable','estado','empleado_id','planilla_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empleado()
    {
        return $this->hasOne('App\Models\Empleado', 'id', 'empleado_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function planilla()
    {
        return $this->hasOne('App\Models\Planilla', 'id', 'planilla_id');
    }
    
}
