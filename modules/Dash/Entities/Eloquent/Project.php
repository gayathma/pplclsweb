<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model 
{
    
    protected $table = 'project';
    
    protected $fillable = ['name', 'start_date', 'end_date', 'project_type_id', 'description'];

    /*public function prphases()
    {
        return $this->belongsToMany(Prphase::class,'project_prphase');
    }*/

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

}