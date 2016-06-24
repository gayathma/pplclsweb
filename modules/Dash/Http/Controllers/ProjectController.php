<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\ProjectType;
use Modules\Dash\Entities\Eloquent\Project;
use Modules\Dash\Entities\Eloquent\Prphase;
use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Contracts\ProjectRepositoryContract as ProjectRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use Modules\Dash\Http\Requests\CreateProjectRequest;
use View;
use Request;

class ProjectController extends Controller {

	private $projectRepository;
	private $settingRepository;

	public function getList(){

		$template = 'dash::project.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'projects' => Project::all()
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
	    			'projectTypes' => ProjectType::all(),
	    			'phases' => Prphase::all()
    			])->render()])->render();
    }

    public function __construct(ProjectRepository $projectRepository, SettingRepository $settingRepository)
    {
    	$this->projectRepository = $projectRepository;
    	$this->settingRepository = $settingRepository;
    }

}