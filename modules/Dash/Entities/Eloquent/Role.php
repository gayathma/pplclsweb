<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model 
{
    
    protected $table = 'dim_hrole';
    
    protected $fillable = ['name','parent'];

    public function employeeits()
    {
        return $this->hasMany(Employeeit::class, 'dim_hrole_id');
    }


}