<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Setting extends Model 
{
    
    protected $table = 'setting';
    
    protected $fillable = ['setting', 'value'];

}