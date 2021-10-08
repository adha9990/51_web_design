<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function ok($data = ''){
        return response([
            'success' => true,
            'message' => '',
            'data' => $data,
        ], 200);
    }

    function error($msg, $status = 400){
        return response([
            'success' => false,
            'message' => $msg,
            'data' => '',
        ], $status);
    }
}
