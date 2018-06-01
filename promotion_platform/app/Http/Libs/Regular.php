<?php
/**
 * @example      正则表达式
 * @file         Regular.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2017-11-06
 * @time         11:07
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Libs;

class Regular
{
    //手机号
    const MOBILE = "/^1[13456789]\d{9}$/";
    //生日
    const BIRTHDAY = "/^([0-9]{3}[1-9]|[0-9]{2}[1-9][0-9]{1}|[0-9]{1}[1-9][0-9]{2}|[1-9][0-9]{3})-(((0[13578]|1[02])-(0[1-9]|[12][0-9]|3[01]))|((0[469]|11)-(0[1-9]|[12][0-9]|30))|(02-(0[1-9]|[1][0-9]|2[0-9])))$/";
    //网址
    const URL = "/^(https:\/\/)|(http:\/\/)/";
    //密码
    const PWD = "/^[a-zA-Z0-9]{32}$/";
    //身份证
    const ID_CARD = "/^((1[1-5])|(2[1-3])|(3[1-7])|(4[1-6])|(5[0-4])|(6[1-5])|(71)|(8[12])|(91))\d{4}((1[89])|(2[0-3]))\d{2}((0[1-9])|(1[0-2]))((0[1-9])|([12][0-9])|(3[01]))\d{3}[0-9Xx]$/";
    //姓名
    const FULL_NAME = "/^[0-9a-zA-Z·\x{4e00}-\x{9fa5}]+$/u";
    //中文
    const CHINESE = "/^[\x{4e00}-\x{9fa5}]+$/u";
    //验证码
    const VERIFY_CODE = "/^\d{4,6}$/";
    //订单ID
    const ORDER_ID = "/^[1-9]\d{19}$/";
    //VIP兑换码
    const REDEEM_CODE = "/^\d{5,20}$/";
    //BOOL
    const BOOL = "/^[01]$/";
}