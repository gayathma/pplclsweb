<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Employeeit;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Gender;
use Modules\Dash\Contracts\TechnologyRepositoryContract as TechnologyRepository;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\ProjectapparelRepositoryContract as ProjectapparelRepository;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\EmployeeapparelRepositoryContract as EmployeeapparelRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;
use Request;

class AnalyticsController extends Controller {

	private $employeeitRepository;
    private $employeeapparelRepository;
	private $settingRepository;
	private $projectRepository;
    private $projectapparelRepository;
	private $technologyRepository;

	public function getProjectTechnology(Request $request){

        if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){

            $technology_chart_data = $this->employeeapparelRepository->getTechnologyChartData($request::get('project_id'));
            return $technology_chart_data;

        }else{

            $technology_chart_data = $this->employeeitRepository->getTechnologyChartData($request::get('project_id'));
            return $technology_chart_data;

        }

	}

	public function getProjectRole(Request $request){

        if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){

            $role_chart_data = $this->employeeapparelRepository->getRoleChartData($request::get('project_id'));
            return $role_chart_data;

        }else{

            $role_chart_data = $this->employeeitRepository->getRoleChartData($request::get('project_id'));
            return $role_chart_data;

        }


	}

	public function getProjectGender(Request $request){

        if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')) {

            $gender_chart_data = $this->employeeapparelRepository->getGenderChartData($request::get('project_id'));
            return $gender_chart_data;

        }else{

            $gender_chart_data = $this->employeeitRepository->getGenderChartData($request::get('project_id'));
            return $gender_chart_data;

        }

	}

	public function getList(){

	if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
		$template = 'dash::analytics.analytical_designer_apparel';
		return View::make($this->layout, ['content' => View::make($template,[
			'projects' => $this->projectapparelRepository->all(),
			'gender_chart_data' => json_encode($this->employeeapparelRepository->getGenderChartData(0)),
			'role_chart_data' => json_encode($this->employeeapparelRepository->getRoleChartData(0)),
			'technologies' => $this->technologyRepository->all()->pluck('name'),
			'technology_chart_data' => json_encode($this->employeeapparelRepository->getTechnologyChartData(0))
		])->render()])->render();
	}
	else{
		$template = 'dash::analytics.analytical_designer';
		return View::make($this->layout, ['content' => View::make($template,[
			'projects' => $this->projectRepository->all(),
			'gender_chart_data' => json_encode($this->employeeitRepository->getGenderChartData(0)),
			'role_chart_data' => json_encode($this->employeeitRepository->getRoleChartData(0)),
			'technologies' => $this->technologyRepository->all()->pluck('name'),
			'technology_chart_data' => json_encode($this->employeeitRepository->getTechnologyChartData(0))
		])->render()])->render();
	}

	}

	public function __construct(EmployeeitRepository $employeeitRepository, EmployeeapparelRepository $employeeapparelRepository, SettingRepository $settingRepository,
		ProjectRepository $projectRepository, ProjectapparelRepository $projectapparelRepository, TechnologyRepository $technologyRepository)
    {
    	$this->employeeitRepository = $employeeitRepository;
        $this->employeeapparelRepository = $employeeapparelRepository;
    	$this->settingRepository = $settingRepository;
    	$this->projectRepository = $projectRepository;
        $this->projectapparelRepository = $projectapparelRepository;
    	$this->technologyRepository = $technologyRepository;
    }
	
}