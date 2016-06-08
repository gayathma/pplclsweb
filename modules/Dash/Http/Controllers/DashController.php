<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use View;

class DashController extends Controller {
	
	public function index()
	{

		$template = 'dash::portal.home';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	
	}

	public function getTeamStructure(){

		$template = 'dash::portal.team_structure';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}

	public function getAnalyticalDesigner(){

		$template = 'dash::portal.analytical_designer';

		return View::make($this->layout, ['content' => View::make($template)->render()])->render();
	}
	
}