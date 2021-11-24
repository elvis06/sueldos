<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'empresas';

    protected $fillable = ['nombre','propietario','nit','direccion','telefono','ciudad','representante','ci_representante','tel_representante','nro_min_trabajo','nro_caja_salud','lucro','rubro','tipo','estado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany('App\Models\Empleado', 'empresa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        //return $this->hasMany('App\Models\UserEmpresa', 'empresa_id', 'id');
        return $this->belongsToMany('App\Models\User')->withTimesTamps();
        
    }
    
}
