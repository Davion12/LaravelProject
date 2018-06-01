<?php
/**
 * @example      渠道商用户信息
 * @file         UserController.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-14
 * @time         16:43
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Controllers\Channel\User;


use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * 主页内容
     */
    public function index(){
        return view("main.index");
    }

    public function userInfo(){

    }
}