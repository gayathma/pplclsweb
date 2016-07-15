<?php 

namespace Modules\Dash\Entities\Eloquent;
   
use Illuminate\Database\Eloquent\Model;
use DB;

class Employeeit extends Model 
{
    
    protected $table = 'dim_hemployee';
    
    protected $fillable = ['first_name', 'last_name', 'email', 'age', 'grade','dim_hsalutation_id',
    'dim_hgender_id', 'working_experience_current', 'working_experience_previous', 'dim_hqualifications_id', 'is_pmp_certified','dim_hrole_id'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'dim_hrole_id');
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
        return $this->belongsTo(Qualification::class, 'dim_hqualifications_id');
    }

    public function employeeittechnologies()
    {
        return $this->hasMany(EmployeeitTechnology::class,'dim_hemployee_id');
    }


}