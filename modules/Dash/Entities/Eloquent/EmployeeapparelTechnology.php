<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeapparelTechnology extends Model
{
    
    protected $table = 'dim_hemployee_dim_htechnology';
    
    protected $fillable = ['dim_hemployee_id', 'dim_htechnology_id', 'grade'];

    public function employeeapparel()
    {
        return $this->belongsTo(Employeeapparel::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class,'dim_htechnology_id');
    }


}