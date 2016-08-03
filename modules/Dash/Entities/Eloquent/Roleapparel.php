<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Roleapparel extends Model 
{
    
    protected $table = 'dim_hrole_apparel';
    
    protected $fillable = ['name','parent'];

    public function employeeapparel()
    {
        return $this->hasMany(Employeeapparel::class, 'dim_hrole_id');
    }


}