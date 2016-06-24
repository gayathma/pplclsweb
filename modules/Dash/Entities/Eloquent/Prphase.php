<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Prphase extends Model 
{
	use SoftDeletes;
    
    protected $table = 'prphase';
    
    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];


}