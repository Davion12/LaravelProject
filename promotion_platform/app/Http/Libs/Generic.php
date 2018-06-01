<?php
/**
 * @example      公用方法
 * @file         Generic.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2017-11-03
 * @time         17:13
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Libs;


use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Excel;

trait Generic
{
    /**
     * @param $fileName
     * @param int $level
     * @return Logger
     * @throws \Exception
     */
    protected static function _staGetLog($fileName, $level = Logger::INFO)
    {
        $fileName = strtolower($fileName);
        $filePath = $level == Logger::INFO ? "{Y}{m}{d}/{$fileName}.log" : ($level == Logger::ERROR ? "error/{Y}{m}{d}_{$fileName}.log" : "{Y}{m}{d}/{H}/{$fileName}.log");
        $filePath = "logs/{$filePath}";
        $sh = (new StreamHandler(storage_path(strtr($filePath, ["{Y}" => date("Y"), "{m}" => date("m"), "{d}" => date("d"), "{H}" => date("H")])), $level))
            ->setFormatter(new LineFormatter(null, null, true, true));
        return new Logger($fileName, [$sh]);
    }

    /**
     * @param $funName
     * @param $logDesc
     * @param $errorMsg
     * @throws \Exception
     */
    protected static function _staPrintErrorLog($funName, $logDesc, $errorMsg)
    {
        $log = self::_staGetLog("error", Logger::ERROR);
        $log->error("func:{$funName},explain:{$logDesc},abnormal:", (array)$errorMsg);
    }


    /**
     * @param string $fileName 日志名
     * @param int $level    日志等级
     * @return Logger
     * @throws \Exception
     */
    protected function _getLog($fileName, $level = Logger::INFO)
    {
        return self::_staGetLog($fileName, $level);
    }

    /**
     * 异常日志
     * @param string $funName 方法名
     * @param string $logDesc 异常描述
     * @param string|array $errorMsg 异常信息
     * @throws \Exception
     */
    protected function _printErrorLog($funName, $logDesc, $errorMsg)
    {
        self::_staPrintErrorLog($funName, $logDesc, $errorMsg);
    }

    /**
     * 静态方法获取数据字符串
     * @param null|int $length 随机字符串长度
     * @return string
     */
    protected static function _staNonceStr($length = null)
    {
        $length = $length ? $length : mt_rand(16, 32);
        $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        while ($length > strlen($str)) {
            $str .= $str;
        }
        $str = str_shuffle($str);
        return substr($str, 0, $length);
    }

    /**
     * 获取数据字符串
     * @param null|int $length 随机字符串长度
     * @return string
     */
    protected function _nonceStr($length = null)
    {
        return self::_staNonceStr($length);
    }

    /**
     * 生成随机数字
     * @param null|int $length 随机数长度
     * @return string
     */
    protected function _nonceDigit($length = null)
    {
        $length = $length ? $length : mt_rand(4, 6);
        $nonceDigit = "";
        while ($length) {
            $nonceDigit .= mt_rand(0, 9);
            $length--;
        }
        return $nonceDigit;
    }

    /**
     * 身份证有效性验证
     * @param string $idCard 待验证身份证号
     * @return bool
     */
    protected function _idCardVerify($idCard)
    {
        //判断格式
        if (!preg_match(Regular::ID_CARD, $idCard)) return false;
        //判断生日
        $birth = substr($idCard, 6, 8);
        if ($birth != date('Ymd', strtotime($birth))) return false;
        //加权因子
        $factor = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
        //校验码对应值
        $code = ['1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2'];
        $checksum = 0;
        for ($i = 0; $i < 17; $i++) {
            $checksum += $idCard{$i} * $factor[$i];
        }
        return $code[$checksum % 11] == strtoupper($idCard{17});
    }

    /**
     * 验证手机号
     * @param string $phoneNum 待验证手机号
     * @return bool
     */
    protected function _phoneNumberVerify($phoneNum)
    {
        return preg_match(Regular::MOBILE, $phoneNum) ? true : false;
    }


    /**
     * 最简单的XML转数组
     * @param string $xmlStr XMl转字符串
     * @return mixed
     */
    protected function _simplestXmlToArray($xmlStr)
    {
        return json_decode(json_encode((array)simplexml_load_string($xmlStr)), true);
    }

    /**
     * 通过生日获取年龄
     * @param string $birth 生日 格式：YYYY-MM-DD/YYYYMMDD
     * @return int
     */
    protected function _getAgeByBirth($birth)
    {
        $birthTime = strtotime($birth);
        $age = date("Y") - date("Y", $birthTime);
        $age = (date("m") > date("m", $birthTime)
            || (date("m", $birthTime) == date("m")
                && date("d") > date("d", $birthTime))) ? $age - 1 : $age;

        return $age > 0 ? $age : 0;
    }

    /**
     * 生成GUID
     * @return string
     */
    protected function _createGUID()
    {
        if (function_exists('com_create_guid')) {
            return com_create_guid();
        } else {
            mt_srand((double)microtime() * 10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);
            $uuid = chr(123)
                . substr($charid, 0, 8) . $hyphen
                . substr($charid, 8, 4) . $hyphen
                . substr($charid, 12, 4) . $hyphen
                . substr($charid, 16, 4) . $hyphen
                . substr($charid, 20, 12)
                . chr(125);
            return $uuid;
        }
    }


    /**
     * 获取字符串长度
     * @param $str
     * @return int
     */
    protected function _getStrLength($str)
    {
        return mb_strlen($str, $this->_getMbDetectEncoding($str));
    }

    /**
     * 获取字符串编码
     * @param string $str 待验证编码字符串
     * @return bool|false|mixed|string
     */
    protected function _getMbDetectEncoding($str)
    {
        return mb_detect_encoding($str, ["ASCII", "UTF-8", "GB2312", "GBK", "BIG5"]);
    }

    /**
     * 字符串截取
     * @param string $str 待截取字符串
     * @param int $start 开始位置
     * @param null|int $length 长度
     * @param string $postfix 字符串
     * @return string
     */
    protected function _mbSubStr($str, $start = 0, $length = null, $postfix = "")
    {
        $strLg = $this->_getStrLength($str);
        $length = $length ? $length : ($strLg - $start);
        $postfix = $strLg > ($length + $start) ? $postfix : "";
        return mb_substr($str, $start, $length, $this->_getMbDetectEncoding($str)) . $postfix;
    }

    /**
     * 获取当前时间
     * @param string $format 时间格式
     * @return false|string
     */
    protected function _getCurrentDate($format = "Y-m-d")
    {
        return date($format);
    }

    /**
     * 获取当前时间
     * @param string $format
     * @return false|string
     */
    protected function _getCurrentDateTime($format = "Y-m-d H:i:s")
    {
        return date($format);
    }

    /**
     * 获取身份证信息
     * @param string $idCard 身份证号码
     * @param int $age 年龄
     * @param string $birth 生日
     * @param int $sex 性别 1-男 2-女
     * @return bool
     */
    protected function _getIdCardInfo($idCard, &$age, &$birth, &$sex)
    {
        if (!$this->_idCardVerify($idCard)) return false;
        $birth = $this->_dateFormat(substr($idCard, 6, 8), "Y-m-d");
        $age = $this->_getAgeByBirth($birth);
        $sex = $idCard{16} % 2 ? 1 : 2;
        return true;
    }

    /**
     * 日期格式化
     * @param string|int $str
     * @param string $format
     * @return false|string
     */
    protected function _dateFormat($str, $format = "Y-m-d H:i:s")
    {
        $time = preg_match("/^1\d{10}$/", $str) ? $str : strtotime($str);
        return date($format, $time);
    }

    /**
     * 字与字之间加空格
     * @param string $str
     * @return string
     */
    protected function _blankStr($str)
    {
        $encoding = $this->_getMbDetectEncoding($str);
        $length = $this->_getStrLength($str);
        $resStr = "";
        for ($i = 0; $i < $length; $i++) {
            $resStr .= mb_substr($str, $i, 1, $encoding) . " ";
        }
        return $resStr;
    }

    /**
     * 获取当前时间戳（毫秒级）
     * @param bool $getAsFloat
     * @return mixed|string
     */
    protected function _getCurrentMSTime($getAsFloat = false)
    {
        $mSTime = microtime(true);
        if ($getAsFloat) return $mSTime;
        list($time, $ms) = explode(".", $mSTime);
        $ms = substr($ms, 0, 3);
        return $time . str_pad($ms, 7, "0", STR_PAD_RIGHT);
    }

    /**
     * 实现多种字符编码方式
     * @param string $input 需要编码的字符串
     * @param string $outputCharset 输出的编码格式
     * @param string $inputCharset 输入的编码格式
     * @return mixed|string 编码后的字符串
     */
    protected function _charsetEncode($input, $outputCharset, $inputCharset)
    {
        if (!isset($outputCharset)) $outputCharset = $inputCharset;
        if ($inputCharset == $outputCharset || $input == null) {
            $output = $input;
        } elseif (function_exists("mb_convert_encoding")) {
            $output = mb_convert_encoding($input, $outputCharset, $inputCharset);
        } elseif (function_exists("iconv")) {
            $output = iconv($inputCharset, $outputCharset, $input);
        } else die("sorry, you have no libs support for charset change.");
        return $output;
    }

    /**
     * 获取当前域名
     * @return string
     */
    protected function _getCurrentDomain()
    {
        $url = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
        return $url . rtrim($_SERVER['HTTP_HOST'], "/") . "/";
    }

    /**
     * excel 导出
     * @param $fileName
     * @param $head
     * @param $list
     * @param string $style
     * @param array $intro
     * @return mixed
     */
    protected static function _staExport($fileName,$head,$list,$style="xls",$intro = []){
        $keys = array_keys($head);
        $data = [array_values($head)];
        $data = array_merge($intro,$data);
        foreach ($list as $key => $value){
            $item = [];
            $value['inc_id'] = $key + 1;
            foreach ($keys as $key){
                array_push($item,@$value[$key]);
            }
            array_push($data,$item);
        }

        return Excel::create($fileName,function ($excel) use ($data){
            $excel->sheet('score', function($sheet) use ($data){
                $sheet->rows($data);
            });
        })->export($style);
    }
}