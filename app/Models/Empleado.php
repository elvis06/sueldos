<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empleados';

    protected $fillable = ['nombre','apellido_pat','apellido_mat','apellido_casada','tipo_doc','num_doc','ext_ci','nacionalidad','fecha_nac','sexo','direccion','telefono','fecha_ingreso','cargo','tipo_actividad','haber_basico','banco','nro_cuenta','entidad_afp','cua','cod_rciva','novedad','estado','empresa_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
}
