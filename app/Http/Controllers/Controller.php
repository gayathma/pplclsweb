<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $layout = 'dash::layouts.master';

    public function printJson($success = false, $data = [], $msg = null)
    {
        return response()->json([
            'success' => $success,
            'data' => $data,
            'message' => $msg,
        ]);
    }

    public function __call($func, $params)
    {
        if (substr($func, 0, 4) == 'auth') {

            $func = camel_case(substr($func, 4));

            if (is_null(Auth::user())) {
                abort(403);
            }

            if (!Auth::user()->$func(implode('', $params))) {
                Log::alert(__METHOD__. ' user does not have permissions : ' . $func . ' ' . json_encode($params));
                abort(403);
            }
        }
    }
}
