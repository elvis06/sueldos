<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UfvDato extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'ufv-datos';

    protected $fillable = ['fecha','ufv'];
	
}
