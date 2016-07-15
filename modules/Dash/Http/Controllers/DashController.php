<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;

class DashController extends Controller {

	private $settingRepository;
	private $employeeitRepository;
	private $projectRepository;
	
	public function index()
	{
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){

			$template = 'dash::portal.home_apparel';
		}else{
			$template = 'dash::portal.home';
			$employees = $this->employeeitRepository->all();
			$projects = $this->projectRepository->all();

		}
		
		return View::make($this->layout, ['content' => View::make($template,[
				'employees' => $employees,
				'projects' => $projects
			])->render()])->render();
	
	}


	public function getTeamStructure(){

		$template = 'dash::portal.team_structure';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}

	public function getAnalyticalDesigner(){

		$template = 'dash::portal.analytical_designer';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}

	public function getTeamStructureApparel(){

		$template = 'dash::portal.team_structure_apparel';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}

	public function __construct(SettingRepository $settingRepository, EmployeeitRepository $employeeitRepository,
	 	ProjectRepository $projectRepository){

    	$this->settingRepository = $settingRepository;
    	$this->employeeitRepository = $employeeitRepository;
    	$this->projectRepository = $projectRepository;
    	$this->employeeitRepository = $employeeitRepository;
    }
	
}