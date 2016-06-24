<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Technology extends Model 
{
	use SoftDeletes;
    
    protected $table = 'technology';
    
    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];


}