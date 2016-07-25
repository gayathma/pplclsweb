<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model 
{
    
    protected $table = 'dim_hrole';
    
    protected $fillable = ['name','parent'];

    public function emplyeeits()
    {
        return $this->hasMany(Employeeit::class);
    }


}