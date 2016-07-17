<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Employeeit;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Knowledgebase;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;
use DB;

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
			$newProjects = Project::where('is_team_assigned', 0)->get();
			$vacantEmployees = Employeeit::where('is_available' , 1)->take(50)->get();
			$ongoingProjectsCount = Project::where('estimated_end_date', '>=', 'CURDATE()')->where('is_team_assigned', 1)->get()->count();
			$closedProjectsCount = Project::where('estimated_end_date', '<', 'CURDATE()')->where('is_team_assigned', 1)->get()->count();
			$newProjectsCount = Project::where('is_team_assigned', 0)->count();
			$thisMonthTeams = Knowledgebase::where(DB::raw('MONTH(created_at)'), '=', date('n'))->groupBy('dim_hproject_id')->get();
			$teams = Knowledgebase::groupBy('dim_hproject_id')->get();
			$projectNames = Project::where('estimated_end_date', '<', 'CURDATE()')->where('is_team_assigned', 1)->get()->pluck('name');
			$projectWorkloadData = $this->projectRepository->getWorkloadChartData();

		}
		return View::make($this->layout, ['content' => View::make($template,[
				'employees' => $employees,
				'projects' => $projects,
				'newProjects' => $newProjects,
				'vacantEmployees' => $vacantEmployees,
				'ongoingProjectsCount' => $ongoingProjectsCount,
				'closedProjectsCount' => $closedProjectsCount,
				'newProjectsCount' => $newProjectsCount,
				'thisMonthTeams' => $thisMonthTeams,
				'teams' => $teams,
				'projectNames' => $projectNames,
				'projectWorkloadData' => json_encode($projectWorkloadData)
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