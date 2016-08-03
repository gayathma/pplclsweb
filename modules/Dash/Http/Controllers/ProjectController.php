<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\ProjectType;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Projectapparel;
use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Entities\Eloquent\Roleapparel;
use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\ProjectapparelRepositoryContract as ProjectapparelRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\EmployeeapparelRepositoryContract as EmployeeapparelRepository;
use Modules\Dash\Contracts\KnowledgebaseRepositoryContract as KnowledgebaseRepository;
use Modules\Dash\Http\Requests\CreateProjectRequest;
use Modules\Dash\Http\Requests\CreateProjectRequestapparel;
use View;
use Request;

class ProjectController extends Controller {

	private $projectRepository;
	private $projectapparelRepository;
	private $settingRepository;
	private $employeeitRepository;
	private $employeeapparelRepository;
	private $knowledgebaseRepository;

	public function buildTree(array $elements, $parentId = 0) {
	    $branch = array();
	    foreach ($elements as $element) {

	    	$new_element = new \StdClass;
	    	$new_element->id = $element->employee_id;
	    	$new_element->name = $element->first_name.' '.$element->last_name;
	    	$new_element->role = $element->role_name;

	        if ($element->parent == $parentId) {
	            $children = $this->buildTree($elements, $element->dim_hrole_id);
	            if ($children) {
	                $new_element->children = $children;
	            }
	            $branch[] = $new_element;
	        }
	    }

	    return $branch;
	}


	public function getAlgorithmAccuracy(Request $request)
    {
		
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			
			$output = array();
    	exec('python '.app_path().'/ApparelModel/Accuracy.py ',$output, $return);

        return View::make('dash::team.accuracy', [
        		'data' => $output
			]);
			
		}
		else{
    	$output = array();
    	exec('python '.app_path().'/ItModel/Accuracy.py ',$output, $return);

        return View::make('dash::team.accuracy', [
        		'data' => $output
			]);
		}
    }

	public function getProjectDetails(ProjectRepository $projectRepository,ProjectapparelRepository $projectapparelRepository,Request $request){
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			return View::make('dash::team.project_details', [
				'project' => ($request::get('project_id') != '')? $projectapparelRepository->find($request::get('project_id')) : null
			]);
			
		}
		else{
		return View::make('dash::team.project_details', [
				'project' => ($request::get('project_id') != '')? $projectRepository->find($request::get('project_id')) : null
			]);
		}
	}

	public function getTeam($project_id, ProjectRepository $projectRepository, ProjectapparelRepository $projectapparelRepository)
	{
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			
		$project = $projectapparelRepository->find($project_id);
		$members = $project->employeeapparelknowledgebases;
            
    	
		return View::make($this->layout, ['content' => View::make('dash::team.team_details',[
				'project' => $project,
				'employees' => $members,
				'settingRepository' => $this->settingRepository
			])->render()])->render();
			
		}
		else{
		$project = $projectRepository->find($project_id);
		$members = $project->employeeitknowledgebases;
    	
		return View::make($this->layout, ['content' => View::make('dash::team.team_details',[
				'project' => $project,
				'employees' => $members
			])->render()])->render();
		}
	}

	public function postPredictTeam( ProjectRepository $projectRepository, ProjectapparelRepository $projectapparelRepository, Request $request)
    {
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			
		$output = array();
    	$algo_type = $request::get('algo');
    	if($algo_type == 1){ 
    		exec('python '.app_path().'/ApparelModel/SVM_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'svm_prob';
    	}elseif($algo_type == 2){
    		exec('python '.app_path().'/ApparelModel/KNN_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'knn_prob';
    	}elseif($algo_type == 3){
    		exec('python '.app_path().'/ApparelModel/NB_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'nb_prob';
    	}
    	$members = $this->employeeapparelRepository->getTeamMembers($request::all(), $algo);
    	$project = $projectapparelRepository->find($request::get('project'));
    	$this->knowledgebaseRepository->create(array_merge($members, ['project' => $project]));
    	$project->update(['is_team_assigned' => 1]);
    	$tree = $this->buildTree($members);

        return View::make($this->layout, ['content' => View::make('dash::team.team',[
				'project' => $project,
				'employees' => $members,
				'tree' => json_encode($tree)
			])->render()])->render();		
		}
		
		else{
			
		$output = array();
    	$algo_type = $request::get('algo');
    	if($algo_type == 1){ 
    		exec('python '.app_path().'/ItModel/SVM_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'svm_prob';
    	}elseif($algo_type == 2){
    		exec('python '.app_path().'/ItModel/KNN_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'knn_prob';
    	}elseif($algo_type == 3){
    		exec('python '.app_path().'/ItModel/NB_Model.py '.$request::get('project'),$output, $return);
    		$algo = 'nb_prob';
    	}
    	$members = $this->employeeitRepository->getTeamMembers($request::all(), $algo);
    	$project = $projectRepository->find($request::get('project'));
    	$this->knowledgebaseRepository->create(array_merge($members, ['project' => $project]));
    	$project->update(['is_team_assigned' => 1]);
    	$tree = $this->buildTree($members);

        return View::make($this->layout, ['content' => View::make('dash::team.team',[
				'project' => $project,
				'employees' => $members,
				'tree' => json_encode($tree)
			])->render()])->render();
			
		}
    	
    }

	public function getList(){
		
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			
		$template = 'dash::project.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => $this->projectapparelRepository->paginate(10)
			])->render()])->render();
			
		}
		else{
		$template = 'dash::project.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => $this->projectRepository->paginate(10)
			])->render()])->render();
		}
	}

	public function getTeamBuilderProjectPhases(ProjectRepository $projectRepository,ProjectapparelRepository $projectapparelRepository,Request $request){
		
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			
			return View::make('dash::team.wizard_partials.step_twoapparel', [
				'project' => $projectapparelRepository->find($request::get('project_id')),
				'roles' => Roleapparel::all(),
				'technologies' => Technology::all()
			]);
			
		}
		else{
		return View::make('dash::team.wizard_partials.step_two', [
				'project' => $projectRepository->find($request::get('project_id')),
				'roles' => Role::all(),
				'technologies' => Technology::all()
			]);
		}
	}
	

	public function getTeamBuilder(){
		
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
		
		$template = 'dash::team.builder';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => Projectapparel::where('is_team_assigned', 0)->get(),
				'settingRepository' => $this->settingRepository
			])->render()])->render();		
			
		}
		else{
			
		$template = 'dash::team.builder';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => Project::where('is_team_assigned', 0)->get(),
				'settingRepository' => $this->settingRepository
			])->render()])->render();

		}
		
	}

	public function postNew(CreateProjectRequest $request)
    {
		
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
		$batch = $this->projectapparelRepository->create($request->all());

        return $this->printJson(true, [],'Project Created Successfully!!');
			
		}
		else{
        $batch = $this->projectRepository->create($request->all());

        return $this->printJson(true, [],'Project Created Successfully!!');
		
		}
    }

    public function getNew()
    {
		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			$template = 'dash::project.editapparel';

    	return View::make(
    		$this->layout, ['content' => View::make($template, [
	    			'project' => null
    			])->render()])->render();
		}
		else{
			
			$template = 'dash::project.edit';

    	return View::make(
    		$this->layout, ['content' => View::make($template, [
	    			'project' => null,
	    			'projectTypes' => ProjectType::all()
    			])->render()])->render();
			
		}
    	
    }

    public function __construct(ProjectRepository $projectRepository,ProjectapparelRepository $projectapparelRepository, SettingRepository $settingRepository,
    	EmployeeitRepository $employeeitRepository, EmployeeapparelRepository $employeeapparelRepository, KnowledgebaseRepository $knowledgebaseRepository)
    {
    	$this->projectRepository = $projectRepository;
		$this->projectapparelRepository = $projectapparelRepository;
    	$this->settingRepository = $settingRepository;
    	$this->employeeitRepository = $employeeitRepository;
		$this->employeeapparelRepository = $employeeapparelRepository;
    	$this->knowledgebaseRepository = $knowledgebaseRepository;
    }

}