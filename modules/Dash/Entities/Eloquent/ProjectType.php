<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class ProjectType extends Model 
{
    
    protected $table = 'project_type';
    
    protected $fillable = ['name'];


}