<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    protected $_param;
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function __construct(Request $request)
    {
        $this->_param = (array)$request->all();
    }

    public function getGuard()
    {
        return $this->guard;
    }

    public function __get($name)
    {
        if(array_key_exists($name,$this->_param)){
            return $this->_param[$name];
        }
        return null;
    }

    public function ajaxReturn($res){
        die((is_array($res)|| is_object($res)) ? json_encode($res) : $res);
    }
}
