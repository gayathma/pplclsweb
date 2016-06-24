<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Technology;
use Modules\Dash\Contracts\TechnologyRepositoryContract as TechnologyRepository;
use Modules\Dash\Http\Requests\CreateTechnologyRequest;
use Modules\Dash\Http\Requests\UpdateTechnologyRequest;
use View;
use Request;

class TechnologyController extends Controller {

	private $technologyRepository;

    public function getDelete(Request $request)
    {

        $this->technologyRepository->find($request::get('tech_id'))->delete();

        return $this->printJson(true, [], '');  

    }


    public function postEdit(UpdateTechnologyRequest $request)
    {
        $this->technologyRepository->update($request->all(),$request->get('tech_id'));

        return $this->printJson(true, [], 'Technology Saved Successfully!!');
    }

    public function getEdit(Request $request)
    {
        return View::make('dash::technology.edit', [
                'technology' => $this->technologyRepository->find($request::get('tech_id'))
            ]);
    }

	public function getList(){

		$template = 'dash::technology.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'technologies' => Technology::all()
			])->render()])->render();
	}

	public function postNew(CreateTechnologyRequest $request)
    {

        $technology = $this->technologyRepository->create($request->all());

        return $this->printJson(true, [],'Technology Created Successfully!!');
    }

    public function getNew()
    {
        return View::make('dash::technology.edit', ['technology' => null]);
    }

    public function __construct(TechnologyRepository $technologyRepository)
    {
    	$this->technologyRepository = $technologyRepository;
    }

}