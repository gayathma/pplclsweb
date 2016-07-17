<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Knowledgebase extends Model 
{
    
    protected $table = 'fact_knowledgebase';
    
    protected $fillable = ['dim_hemployee_id', 'dim_hproject_id', 'workload_planned',
     'workload_actual', 'start_date', 'estimated_end_date', 'actual_end_date','is_suitable'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'dim_hproject_id');
    }

    public function employeeit()
    {
        return $this->belongsTo(Employeeit::class, 'dim_hemployee_id');
    }


}