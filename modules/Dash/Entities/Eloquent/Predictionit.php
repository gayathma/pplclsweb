<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Predictionit extends Model 
{
    
    protected $table = 'predictionit';
    
    protected $fillable = ['project_id', 'employee_id', 'knn_prob',
     	'svm_prob', 'nb_prob'];

}