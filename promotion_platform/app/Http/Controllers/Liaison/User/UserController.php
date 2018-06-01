<?php
/**
 * @example
 * @file         UserController.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-14
 * @time         17:13
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Controllers\Liaison\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        return redirect( '/');
    }

    public function userInfo(){

    }
}