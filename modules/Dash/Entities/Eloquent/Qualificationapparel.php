<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Qualificationapparel extends Model
{
    
    protected $table = 'dim_hqualifications_apparel';
    
    protected $fillable = ['qualification'];


}