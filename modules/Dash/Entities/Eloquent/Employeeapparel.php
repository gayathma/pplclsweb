<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Employeeapparel extends Model 
{
    
    protected $table = 'dim_hemployee_apparel';
    
    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'grade','dim_hsalutation_id',
        'dim_hgender_id', 'working_experience_current', 'working_experience_previous', 'dim_hqualifications_id',
        'is_pmp_certified','dim_hrole_id', 'is_available'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function role()
    {
        return $this->belongsTo(Roleapparel::class, 'dim_hrole_id');
    }

    public function salutation()
    {
        return $this->belongsTo(Salutation::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'dim_hgender_id');
    }

    public function qualification()
    {
        return $this->belongsTo(Qualificationapparel::class, 'dim_hqualifications_id');
    }

    public function employeeappareltechnologies()
    {
        return $this->hasMany(EmployeeapparelTechnology::class,'dim_hemployee_id');
    }

    public function employeeapparelknowledgebases()
    {
        return $this->hasMany(Knowledgebaseapparel::class,'dim_hemployee_id');
    }


}