<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Predictionapparel extends Model 
{
    
    protected $table = 'predictionapparel';
    
    protected $fillable = ['project_id', 'employee_id', 'knn_prob',
     	'svm_prob', 'nb_prob'];

}