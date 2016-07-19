<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Employeeit;
use Modules\Dash\Contracts\EmployeeitRepositoryContract as EmployeeitRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;

class EmployeeController extends Controller {

	private $employeeitRepository;
	private $settingRepository;
	

	public function getProfile($id){

		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){
			$template = 'dash::employees.profile_apparel';
			$projects = null;
		}else{
			$template = 'dash::employees.profile';
			$projects = $this->employeeitRepository->find($id)->employeeitknowledgebases;
		}

		return View::make($this->layout, ['content' => View::make($template,[
				'employee' => $this->employeeitRepository->find($id),
				'projects' => $projects
			])->render()])->render();
	}

	public function getList(){

		$template = 'dash::employees.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'employees' => $this->employeeitRepository->paginate(12)
			])->render()])->render();
	}

	public function __construct(EmployeeitRepository $employeeitRepository, SettingRepository $settingRepository)
    {
    	$this->employeeitRepository = $employeeitRepository;
    	$this->settingRepository = $settingRepository;

    }
	
}