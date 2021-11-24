<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tributo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tributos';

    protected $fillable = ['ingreso_neto','dos_salarios_min','base_imponible','impuesto_rciva','trece_dos_sal_min','imp_neto_rciva','formulario_c693','saldo_favor_fisco','saldo_favor_dep','saldo_ant_favor_dep','mant_valor','saldo_act','saldo_utilizado','retencion_rciva','siete_periodo_ant','formulario_c465','saldo_siete','pago_siete','impuesto_retenido','saldo_dep','saldo_siete_dep','empleado_id','planilla_id','sueldo_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descuentos()
    {
        return $this->hasMany('App\Models\Descuento', 'tributo_id', 'id');
    }
    
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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sueldo()
    {
        return $this->hasOne('App\Models\Sueldo', 'id', 'sueldo_id');
    }
    
}
