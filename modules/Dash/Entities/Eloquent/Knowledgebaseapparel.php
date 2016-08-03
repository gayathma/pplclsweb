<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Knowledgebaseapparel extends Model 
{
    
    protected $table = 'fact_knowledgebase_apparel';
    
    protected $fillable = ['dim_hemployee_id', 'dim_hproject_id', 'workload_planned',
     'workload_actual', 'start_date', 'estimated_end_date', 'actual_end_date','is_suitable'];

    public function projectapparel()
    {
        return $this->belongsTo(Projectapparel::class, 'dim_hproject_id');
    }

    public function employeeapparel()
    {
        return $this->belongsTo(Employeeapparel::class, 'dim_hemployee_id');
    }


}