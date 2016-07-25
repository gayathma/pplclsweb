<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Gender extends Model 
{
    
    protected $table = 'dim_hgender';
    
    protected $fillable = ['gender'];


}