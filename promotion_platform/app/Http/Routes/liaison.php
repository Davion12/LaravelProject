<?php
/**
 * @example      健康联络员
 * @file         liaison.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2018-05-14
 * @time         11:18
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */
Route::group(
    [
        "middleware" => "auth:liaison",
        "namespace" => "Liaison",
        "prefix" => "liaison"
    ],
    function () {
        //主页相关
        Route::get("index",["as"=>"liaisonMain","uses"=>"MainController@index"]);


        //用户信息相关
        Route::group(
            [
                "namespace" => "User",
                "prefix" => "user"
            ],
            function () {
                //用户信息
                Route::get("info",["as"=>"liaisonUserInfo","uses"=>"UserController@userInfo"]);
                //修改密码
                Route::get("password",["as"=>"liaisonPassword","uses"=>"PasswordController@password"]);
                //用户退出
                Route::get("logout",["as"=>"liaisonLogout","uses"=>"UserController@logout"]);
            }
        );
        //会员卡相关
        Route::group(
            [
                "namespace" => "Vip",
                "prefix" => "vip"
            ],
            function (){
                //佣金
                Route::get("commission/list",["as"=>"channelCommissionList","uses"=>"CommissionController@commissionList"]);
                //佣金导出
                Route::get("commission/excel",["as"=>"channelCommissionExcel","uses"=>"CommissionController@commissionExcel"]);
                //使用记录
                Route::get("card/use/list",["as"=>"channelCardUseRecordList","uses"=>"CardController@useRecordList"]);
                //使用详情
                Route::get("card/use/info",["as"=>"channelCardUseRecordInfo","uses"=>"CardController@useRecordInfo"]);
                //使用记录导出
                Route::get("card/use/excel",["as"=>"channelCardUseRecordExcel","uses"=>"CardController@useRecordExcel"]);
                //激活码列表
                Route::get("card/code/list",["as"=>"channelCardActivationCodeList","uses"=>"CodeController@activationCodeList"]);
                //激活码详细
                Route::get("card/code/info",["as"=>"channelCardActivationCodeInfo","uses"=>"CodeController@activationCodeInfo"]);
                //激活码详细导出
                Route::get("card/code/info/excel",["as"=>"channelCardActivationCodeInfo","uses"=>"CodeController@activationCodeInfoExcel"]);
                //激活码导出
                Route::get("card/code/excel",["as"=>"channelCardActivationCodeExcel","uses"=>"CodeController@activationCodeExcel"]);
            }
        );
    }
);