<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Salutation extends Model 
{
    
    protected $table = 'dim_hsalutation';
    
    protected $fillable = ['title'];


}