<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Grpc\Channel;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Libs\Gjk;
use App\Http\Libs\Constant;
use App\Models;
use Monolog\Logger;


class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
//        parent::__construct($request);
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token = null)
    {
      return view("auth.passwords.reset", ["title" => "重置密码"]);
    }

    /***
     *
     * 获取手机验证码
     */
    public function getVerifyCode(Request $request, $phonenum){
        $role = $request->input("role");
        if($role === "channel"){
            $queryResult = Models\Channel::where("channel_contact_phone", $phonenum)->get()->toArray();
            $codeType = Constant::SMS_TYPE_VERIFY_CODE_FOR_CHANNEL;
        } else {
            $queryResult = Models\Promoter::where("promoter_phone", $phonenum)->get()->toArray();
            $codeType = Constant::SMS_TYPE_VERIFY_CODE_FOR_LIAISON;
        }
        if(count($queryResult) === 0){
            $result = ["code"=>-1,"message"=>"手机账号不存在"];
            $this->ajaxReturn($result);
        } else {
            $result = Gjk::request("/common/verifycode/get",["phone_num"=>$phonenum,"code_type"=>$codeType]);
            $this->ajaxReturn($result);
        }
    }

    /***
     * 重置密码
     * @param Request $request
     */
    public function reset(Request $request){
        $role = $request->input("role");
        if($role === 1){
            $codeType = Constant::SMS_TYPE_VERIFY_CODE_FOR_LIAISON;
            $model = Models\Promoter::class;
        } else {
            $codeType = Constant::SMS_TYPE_VERIFY_CODE_FOR_CHANNEL;
            $model = Models\Channel::class;
        }
        $mobile = $request->input("phonenum");
        $verifyCode = $request->input("verify_code");
        $pwd = $request->input("password");

        $result = Gjk::request("/common/verifycode/check",["phone_num"=>$mobile,"code_type"=>$codeType, "verify_code"=>$verifyCode]);
        $result = json_decode($result,true);
        if(is_array($result) && array_key_exists("code",$result) && $result['code'] == 0){
            $result = $model->updPassword($mobile, md5(md5($pwd)));
            if($result){
                $this->ajaxReturn(["code"=>0,"url"=>"/login","message"=>"修改成功"]);
            }else{
                $this->ajaxReturn(["code"=>-1,"message"=>"修改失败"]);
            }
        }
        $this->ajaxReturn($result);
    }
}
