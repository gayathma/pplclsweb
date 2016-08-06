<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Entities\Eloquent\Roleapparel;
use Modules\Dash\Contracts\RoleRepositoryContract as RoleRepository;
use Modules\Dash\Contracts\RoleapparelRepositoryContract as RoleapparelRepository;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;
use Request;

class RoleController extends Controller {

	private $roleRepository;
	private $roleapparelRepository;
	private $settingRepository;

    public function getDelete(Request $request)
    {

		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){

			$this->roleapparelRepository->find($request::get('role_id'))->delete();

			return $this->printJson(true, [], '');  
		}
		else{
			
			$this->roleRepository->find($request::get('role_id'))->delete();

			return $this->printJson(true, [], ''); 
		}

    }

	public function getList(){

		if(!is_null($this->settingRepository->get('system_type')) && ($this->settingRepository->get('system_type') == 'apparel')){

			$template = 'dash::role.list';

			return View::make($this->layout, ['content' => View::make($template,[
					'roles' => Roleapparel::all(),
					'settingRepository'=>$this->settingRepository
				])->render()])->render();
				
		}
		else{
			$template = 'dash::role.list';

			return View::make($this->layout, ['content' => View::make($template,[
					'roles' => Role::all()
				])->render()])->render();
			
		}
	}

    public function __construct(RoleRepository $roleRepository,RoleapparelRepository $roleapparelRepository, SettingRepository $settingRepository)
    {

    	$this->roleRepository = $roleRepository;
		$this->roleapparelRepository = $roleapparelRepository;
		$this->settingRepository = $settingRepository;
    }

}