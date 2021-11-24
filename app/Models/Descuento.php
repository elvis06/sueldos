<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'descuentos';

    protected $fillable = ['cuenta_prev','riesgo_comun','comision_afp','aporte_solidario','ap_nac_solidario','rc_iva','anticipos','desc','total_desc','empleado_id','tributo_id','sueldo_id'];
	
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
    public function sueldo()
    {
        return $this->hasOne('App\Models\Sueldo', 'id', 'sueldo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tributo()
    {
        return $this->hasOne('App\Models\Tributo', 'id', 'tributo_id');
    }
    
}
