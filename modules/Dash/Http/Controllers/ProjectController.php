<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\ProjectType;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Http\Requests\CreateProjectRequest;
use View;
use Request;

class ProjectController extends Controller {

	private $projectRepository;
	private $settingRepository;
	private $employeeitRepository;

	public function getAlgorithmAccuracy(Request $request)
    {
    	$output = array();
    	exec('python '.app_path().'/ItModel/Accuracy.py ',$output, $return);

        return View::make('dash::team.accuracy', [
        		'data' => $output
			]);
    }

	public function getProjectDetails(ProjectRepository $projectRepository,Request $request){
		return View::make('dash::team.project_details', [
				'project' => ($request::get('project_id') != '')? $projectRepository->find($request::get('project_id')) : null
			]);
	}

	public function getTeam($project_id, $algo_type, ProjectRepository $projectRepository,Request $request)
	{
		
	}

	public function postPredictTeam( ProjectRepository $projectRepository, Request $request)
    {
    	$output = array();
    	$algo_type = $request::get('algo');
    	if($algo_type == 1){ 
    		exec('python '.app_path().'/ItModel/SVM_Model.py '.$request::get('project'),$output, $return);
    	}elseif($algo_type == 2){
    		exec('python '.app_path().'/ItModel/KNN_Model.py '.$request::get('project'),$output, $return);
    	}

        return View::make($this->layout, ['content' => View::make('dash::team.team',[
				'project' => $projectRepository->find($request::get('project')),
				'employees' => $this->employeeitRepository->paginate(6)
			])->render()])->render();
    }

	public function getList(){

		$template = 'dash::project.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => $this->projectRepository->paginate(10)
			])->render()])->render();
	}

	public function getTeamBuilderProjectPhases(ProjectRepository $projectRepository,Request $request){
		return View::make('dash::team.wizard_partials.step_two', [
				'project' => $projectRepository->find($request::get('project_id')),
				'roles' => Role::all(),
				'technologies' => Technology::all()
			]);
	}
	

	public function getTeamBuilder(){

		$template = 'dash::team.builder';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => Project::all(),
				'settingRepository' => $this->settingRepository
			])->render()])->render();
	}

	public function postNew(CreateProjectRequest $request)
    {

        $batch = $this->projectRepository->create($request->all());

        return $this->printJson(true, [],'Project Created Successfully!!');
    }

    public function getNew()
    {
    	$template = 'dash::project.edit';

    	return View::make(
    		$this->layout, ['content' => View::make($template, [
	    			'project' => null,
	    			'projectTypes' => ProjectType::all()
    			])->render()])->render();
    }

    public function __construct(ProjectRepository $projectRepository, SettingRepository $settingRepository,
    	EmployeeitRepository $employeeitRepository)
    {
    	$this->projectRepository = $projectRepository;
    	$this->settingRepository = $settingRepository;
    	$this->employeeitRepository = $employeeitRepository;
    }

}