<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'planillas';

    protected $fillable = ['gestion','mes','sueldo_min','domingos','feriados','ultimo_dia','estado','empresa_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function empresa()
    {
        return $this->hasOne('App\Models\Empresa', 'id', 'empresa_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sueldos()
    {
        return $this->hasMany('App\Models\Sueldo', 'planilla_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tributos()
    {
        return $this->hasMany('App\Models\Tributo', 'planilla_id', 'id');
    }
    
}
