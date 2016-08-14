<?php

namespace Modules\Dash\Repositories\Eloquent;

use Modules\Dash\Entities\Eloquent\Setting;
use Modules\Dash\Contracts\SettingRepositoryContract;
use Prettus\Repository\Eloquent\BaseRepository;


class SettingRepository extends BaseRepository implements SettingRepositoryContract
{

    public $settings = ['system_type', 'min_team_size', 'model_select_method'];

    public function createOrUpdate($setting, $value)
    {
        $settingObj = Setting::where(['setting' => $setting])->first();

        if (is_null($settingObj)) {
            $settingObj = new Setting(['setting' => $setting]);
        }

        if (is_array($value)) {
            $value = json_encode($value);
        }

        $settingObj->value = $value;
        $settingObj->save();

        return $settingObj;
    }

    public function updateAll($settings)
    {
        foreach ($this->settings as $setting) {
            if (isset($settings[$setting])) {              
                $this->createOrUpdate($setting, $settings[$setting]);
            }
        }
        
    }

    public function get($setting)
    {
        $setting = Setting::where(['setting' => $setting])->first();

        if (!is_null($setting)) {
            $value = $setting->value;

            if (is_array(json_decode($value))) {
                return json_decode($value);
            } else {
                return $value;
            }
        }

        return '';
    }
 
    public function model()
    {
        return Setting::class;
    }
}