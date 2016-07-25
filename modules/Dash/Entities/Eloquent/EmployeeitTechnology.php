<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeitTechnology extends Model 
{
    
    protected $table = 'dim_hemployee_dim_htechnology';
    
    protected $fillable = ['dim_hemployee_id', 'dim_htechnology_id', 'grade'];

    public function employeeit()
    {
        return $this->belongsTo(Employeeit::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class,'dim_htechnology_id');
    }


}