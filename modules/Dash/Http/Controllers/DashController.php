<?php namespace Modules\Dash\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class DashController extends Controller {
	
	public function index()
	{
		$template = 'dash::portal.home';

		return View::make($this->layout, ['content' => View::make($template , [])->render();
	
	}
	
}