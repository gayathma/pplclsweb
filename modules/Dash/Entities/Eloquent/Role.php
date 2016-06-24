<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model 
{
    
    protected $table = 'role';
    
    protected $fillable = ['name'];


}