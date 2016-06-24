<?php namespace Modules\Dash\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Dash\Entities\Eloquent\Setting;
use Modules\Dash\Contracts\SettingRepositoryContract as SettingRepository;
use View;
use Request;

class SettingController extends Controller {

	private $settingRepository;


    public function postEdit(Request $request)
    {
        $this->settingRepository->updateAll($request::all());

        return redirect('/dash/general-setting/edit');
    }

    public function getEdit()
    {

        return View::make($this->layout, ['content' => View::make('dash::setting.edit',[
                'setting' => $this->settingRepository
            ])->render()])->render();
    }


    public function __construct(SettingRepository $settingRepository)
    {
    	$this->settingRepository = $settingRepository;
    }

}