<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use View;

class EmployeeController extends Controller {
	

	public function getProfile($id){

		$template = 'dash::portal.profile';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}

	public function getProfileApparel($id){

		$template = 'dash::portal.profile_apparel';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}
	
}