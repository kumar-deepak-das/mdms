<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    

    //Get the Master Password
    public function getMasterValue($key=null)
    {
        $rows = DB::table('master')->where('key', $key)->select('value')->get();

        // echo '<pre>'; print_r($rows); exit;

        if(count($rows)==0)
            return null;
        else
            return $rows[0]->value;
    }
}
