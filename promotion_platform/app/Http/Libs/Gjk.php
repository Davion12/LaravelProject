<?php

/**
 * @example      贵健康接口相关
 * @file         Gjk.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2017-06-21
 * @time         ${$TIME}
 * @copyright © 2017, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Libs;

use Monolog\Logger;

class Gjk
{
    use Generic;
    private $_appId, $_appKey, $_url, $_cVer;

    private function __construct()
    {
        $this->_appId = env("WEB_API_APP_ID");
        $this->_appKey = env("WEB_API_APP_KEY");
        $this->_cVer = 7001;
        $this->_url = env("WEB_API_URL");
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }


    /**
     * 参数过滤
     * @param $param
     */
    private static function _paramFilter(&$param)
    {
        if (is_array($param)) {
            while (list($key, $value) = each($param)) {
                if ($value === null || $value == "" || $key == "sign") {
                    unset($param[$key]);
                }
            }
        }
    }

    /**
     * 字典排序
     * @param array $param 排序前的数组
     */
    private static function _argSort(&$param)
    {
        ksort($param);
        reset($param);
    }

    /**
     * 字符串拼接并去除转义
     *
     * @param array $param 带拼接数组
     * @return string
     */
    private static function _createLinkString($param = [])
    {
        $linkString = "";
        if (is_array($param)) {
            while (list($key, $value) = each($param)) {
                $value = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
                $linkString .= "{$key}={$value}&";
            }
        }
        $linkString = substr($linkString, 0, strlen($linkString) - 1);
        if (get_magic_quotes_gpc()) {
            $linkString = stripcslashes($linkString);
        }
        return $linkString;
    }

    /**
     * 生成签名
     * @param $param
     * @param $key
     * @return string
     */
    public static function sign($param, $key)
    {
        /* 参数过滤 */
        self::_paramFilter($param);
        /* 字典排序 */
        self::_argSort($param);
        /* 字符串拼接 */
        $paramStr = self::_createLinkString($param);
        /* 生成签名 */
        $sign = md5("{$paramStr}&key={$key}");
        //所有字符转为大写
        $sign = strtoupper($sign);
        return $sign;
    }

    /**
     * 贵健康API接口网络请求
     * @param $route
     * @param array $param
     * @return mixed
     * @throws \Exception
     */
    public static function request($route, $param = [])
    {
        $api = new self();
        $param = array_merge(
            [
                "user_id" => 120,
                "app_id" => $api->_appId,
                "nonce_str" => self::_staNonceStr(mt_rand(16, 32)),
                "c_ver" => $api->_cVer,
            ], @$param);
        $param['sign'] = self::sign($param, $api->_appKey);
        $json = json_encode($param);
        $url = rtrim($api->_url, "/") . "/" . ltrim($route, "/");
        $bt = microtime(true);
        $result = IHttp::iHttpPost($url, ["json" => $json]);
        $duration = microtime(true) - $bt;
        $content = @$result['content'];
        $log = self::_staGetLog("request", Logger::DEBUG);
        $log->info("api request route:{$route},duration:{$duration}(ms),status:{$result['code']}", ["request" => $param, "response" => $content]);
         return $content;
    }
}