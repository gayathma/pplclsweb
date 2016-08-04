<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Employeeit;
use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Entities\Eloquent\Knowledgebase;
use Modules\Dash\Entities\Eloquent\Predictionit;
use Modules\Dash\Entities\Eloquent\EmployeeitTechnology;
use Modules\Dash\Contracts\EmployeeitRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;
use DB;
use Lang;
use Session;
use App;

class EmployeeitRepository extends BaseRepository implements EmployeeitRepositoryContract
{

	public function create(array $attributes)
	{
		$employeeit = Employeeit::create(array_only($attributes, ['first_name', 'last_name', 'email', 'age', 'grade','dim_hsalutation_id',
    		'dim_hgender_id', 'working_experience_current', 'working_experience_previous', 'dim_hqualifications_id', 'is_pmp_certified','dim_hrole_id']));

		$employeeit->save();
	}

	public function model()
	{
		$lang = (Session::has('lang'))? Session::get('lang'): App::getLocale();
         App::setLocale($lang);
		return Employeeit::class;
	}

	public function getTeamMembers(array $attributes, $algo)
	{
		$members = [];
		foreach ($attributes['roles'] as $role) {
			$count = $attributes['count'][$role];
			$roleMembers = Predictionit::join('dim_hemployee', 'dim_hemployee.id', '=', 'predictionit.employee_id')
				->join('dim_hrole', 'dim_hrole.id', '=', 'dim_hemployee.dim_hrole_id')
				->join('dim_hgender', 'dim_hgender.id', '=', 'dim_hemployee.dim_hgender_id')
				->select('dim_hrole.name as role_name', 'dim_hrole.parent as parent','dim_hemployee.*','dim_hgender.gender','predictionit.employee_id')
				->where('project_id', $attributes['project'])
				->where('dim_hrole_id', $role)
				->where('is_available', 1)
				->orderBy($algo, 'desc')
				->take($count)
				->get()->flatten()->all();

			$members[] = $roleMembers;	
		}
		return collect($members)->flatten()->all();
	}

	public function getGenderChartData($project_id)
	{
		if($project_id == 0){
			$all_employees = Employeeit::count();

			$results = Employeeit::join('dim_hgender', 'dim_hgender.id', '=', 'dim_hemployee.dim_hgender_id')
				->select('dim_hgender.gender',DB::raw('count(*) as y'))
				->groupBy('dim_hgender_id')
				->get();
		}else{
			$all_employees = Knowledgebase::where('dim_hproject_id', $project_id)->count();

			$results = Knowledgebase::join('dim_hemployee', 'dim_hemployee.id', '=', 'fact_knowledgebase.dim_hemployee_id')
				->join('dim_hgender', 'dim_hgender.id', '=', 'dim_hemployee.dim_hgender_id')
				->select('dim_hgender.gender',DB::raw('count(*) as y'))
				->where('dim_hproject_id', $project_id)
				->groupBy('dim_hgender_id')
				->get();
		}

		$result_arr = [];
		foreach ($results as $result) {
			$re = new \StdClass;
			$re->y = round(($result->y * 100) / $all_employees,1) ;
			if($result->gender == 'M'){
				$re->name = Lang::get('custom.male');
			}elseif($result->gender == 'F'){
				$re->name = Lang::get('custom.female');
			}else{
				$re->name = Lang::get('custom.other');
			}
			$result_arr[] = $re;
		}
		return $result_arr;

	}

	public function getRoleChartData($project_id)
	{
		if($project_id == 0){
			$all_employees = Employeeit::count();
			$results = Employeeit::join('dim_hrole', 'dim_hrole.id', '=', 'dim_hemployee.dim_hrole_id')
				->select('dim_hrole.name as role',DB::raw('count(*) as y'))
				->groupBy('dim_hrole_id')
				->get();
		}else{
			$all_employees = Knowledgebase::where('dim_hproject_id', $project_id)->count();
			$results = Knowledgebase::join('dim_hemployee', 'dim_hemployee.id', '=', 'fact_knowledgebase.dim_hemployee_id')
				->join('dim_hrole', 'dim_hrole.id', '=', 'dim_hemployee.dim_hrole_id')
				->select('dim_hrole.name as role',DB::raw('count(*) as y'))
				->where('dim_hproject_id', $project_id)
				->groupBy('dim_hrole_id')
				->get();
		}

		$result_arr = [];
		foreach ($results as $result) {
			$re = new \StdClass;
			$re->y = round(($result->y * 100) / $all_employees,1) ;
			$re->name = $result->role;

			$result_arr[] = $re;
		}
		return $result_arr;

	}

	public function getTechnologyChartData($project_id)
	{

		$technologies = Technology::all();
		$result_arr = [];
		if($project_id == 0){
			foreach ($technologies as $technology) {

				$level1[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->where('grade', 0)->count();

				$level2[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->whereBetween('grade', [1, 2])->count();

				$level3[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->whereBetween('grade', [3, 4])->count();

				$level4[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->whereBetween('grade', [5, 6])->count();

				$level5[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->whereBetween('grade', [7, 8])->count();

				$level6[] = EmployeeitTechnology::where('dim_htechnology_id', $technology->id)
					->whereBetween('grade', [9, 10])->count();

			}
		}else{

			foreach ($technologies as $technology) {

				$level1[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->where('grade', 0)->count();

				$level2[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->whereBetween('grade', [1, 2])->count();

				$level3[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->whereBetween('grade', [3, 4])->count();

				$level4[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->whereBetween('grade', [5, 6])->count();

				$level5[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->whereBetween('grade', [7, 8])->count();

				$level6[] = Knowledgebase::join('dim_hemployee_dim_htechnology', 'dim_hemployee_dim_htechnology.dim_hemployee_id', '=', 'fact_knowledgebase.dim_hemployee_id')
					->where('dim_htechnology_id', $technology->id)
					->where('dim_hproject_id', $project_id)
					->whereBetween('grade', [9, 10])->count();

			}
			
		}

		$result_arr = [['name' => '0','data' => $level1 ],
		['name' => '1 - 2','data' => $level2 ],
		['name' => '3 - 4','data' => $level3 ],
		['name' => '5 - 6','data' => $level4 ],
		['name' => '7 - 8','data' => $level5 ],
		['name' => '9 - 10','data' => $level6 ]];
	
		return $result_arr;
	}


}