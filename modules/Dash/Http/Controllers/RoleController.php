<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Role;
use Modules\Dash\Contracts\RoleRepositoryContract as RoleRepository;
use View;
use Request;

class RoleController extends Controller {

	private $roleRepository;

    public function getDelete(Request $request)
    {

        $this->roleRepository->find($request::get('role_id'))->delete();

        return $this->printJson(true, [], '');  

    }

	public function getList(){

		$template = 'dash::role.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'roles' => Role::all()
			])->render()])->render();
	}

    public function __construct(RoleRepository $roleRepository)
    {
    	$this->roleRepository = $roleRepository;
    }

}