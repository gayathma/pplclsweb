<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model 
{
    
    protected $table = 'dim_hproject';
    
    protected $fillable = ['name', 'wo_received_date', 'estimated_end_date', 'project_value', 'type', 'work_to_be_done', 'description'];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function knowledgebases()
    {
        return $this->hasMany(Knowledgebase::class,'dim_hprojects_id');
    }

}