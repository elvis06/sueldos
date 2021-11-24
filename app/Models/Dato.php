<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'datos';

    protected $fillable = ['fecha','ufv'];
	
}
