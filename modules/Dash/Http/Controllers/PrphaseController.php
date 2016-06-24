<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Prphase;
use Modules\Dash\Contracts\PrphaseRepositoryContract as PrphaseRepository;
use Modules\Dash\Http\Requests\CreatePrphaseRequest;
use Modules\Dash\Http\Requests\UpdatePrphaseRequest;
use View;
use Request;

class PrphaseController extends Controller {

	private $prphaseRepository;

    public function getDelete(Request $request)
    {

        $this->prphaseRepository->find($request::get('pr_id'))->delete();

        return $this->printJson(true, [], '');  

    }


    public function postEdit(UpdatePrphaseRequest $request)
    {
        $this->prphaseRepository->update($request->all(),$request->get('pr_id'));

        return $this->printJson(true, [], 'Project Phase Saved Successfully!!');
    }

    public function getEdit(Request $request)
    {
        return View::make('dash::prphase.edit', [
                'prphase' => $this->prphaseRepository->find($request::get('pr_id'))
            ]);
    }

	public function getList(){

		$template = 'dash::prphase.list';

		return View::make($this->layout, ['content' => View::make($template,[
				'prphases' => Prphase::all()
			])->render()])->render();
	}

	public function postNew(CreatePrphaseRequest $request)
    {

        $prphase = $this->prphaseRepository->create($request->all());

        return $this->printJson(true, [],'Project Phase Created Successfully!!');
    }

    public function getNew()
    {
        return View::make('dash::prphase.edit', ['prphase' => null]);
    }

    public function __construct(PrphaseRepository $prphaseRepository)
    {
    	$this->prphaseRepository = $prphaseRepository;
    }

}