<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Employeeit;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Gender;
use Modules\Dash\Contracts\TechnologyRepositoryContract as TechnologyRepository;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;
use Request;

class AnalyticsController extends Controller {

	private $employeeitRepository;
	private $settingRepository;
	private $projectRepository;
	private $technologyRepository;

	public function getProjectTechnology(Request $request){

		$technology_chart_data = $this->employeeitRepository->getTechnologyChartData($request::get('project_id'));
		return $technology_chart_data;
	}

	public function getProjectRole(Request $request){

		$role_chart_data = $this->employeeitRepository->getRoleChartData($request::get('project_id'));
		return $role_chart_data;
	}

	public function getProjectGender(Request $request){

		$gender_chart_data = $this->employeeitRepository->getGenderChartData($request::get('project_id'));
		return $gender_chart_data;
	}

	public function getList(){

		$template = 'dash::analytics.analytical_designer';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => $this->projectRepository->all(),
				'gender_chart_data' => json_encode($this->employeeitRepository->getGenderChartData(0)),
				'role_chart_data' => json_encode($this->employeeitRepository->getRoleChartData(0)),
				'technologies' => $this->technologyRepository->all()->pluck('name'),
				'technology_chart_data' => json_encode($this->employeeitRepository->getTechnologyChartData(0))
			])->render()])->render();
	}

	public function __construct(EmployeeitRepository $employeeitRepository, SettingRepository $settingRepository, 
		ProjectRepository $projectRepository, TechnologyRepository $technologyRepository)
    {
    	$this->employeeitRepository = $employeeitRepository;
    	$this->settingRepository = $settingRepository;
    	$this->projectRepository = $projectRepository;
    	$this->technologyRepository = $technologyRepository;
    }
	
}