<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected  $username = "mobile";//$guard;
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     * @param $request
     * @return void
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'mobile' => 'required|min:11|max:11',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|min:11|max:11',
            'password' => 'required|min:6',
        ],[
            "mobile.required" =>"请输入登录账户",
            "mobile.min" => "请输入正确的登录账户",
            "mobile.max" => "请输入正确的登录账户",
            "password.required" =>"请输入登录密码",
            "password.min" => "请输入正确的登录密码"
        ]);
    }

    public function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                "message" => $this->getFailedLoginMessage(),
                "guard" => $this->getGuard()
            ]);
    }

    public function getGuard()
    {
        return $this->guard;
    }
}
