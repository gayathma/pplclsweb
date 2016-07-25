<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Qualification extends Model 
{
    
    protected $table = 'dim_hqualifications';
    
    protected $fillable = ['qualification'];


}