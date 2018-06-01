<?php

namespace App\Http\Controllers\Channel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * 主页内容
     */
    public function index(){
        return view("main.index");
    }
}
