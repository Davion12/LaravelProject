<?php

/**
 * @example      网络请求
 * @file         IHttp.class.php
 * @author       Herry.Yao <yuandeng.yao@longmaster.com.cn>
 * @version      v1.0
 * @date         2017-03-30
 * @time         17:42
 * @copyright © 2016, Longmaster Corporation. All right reserved.
 */

namespace App\Http\Libs;

class IHttp
{
    private function __construct()
    {
    }

    public static function strexists($string, $find)
    {
        return !(strpos($string, $find) === FALSE);
    }

    public static function iHttpRequest($url, $post = '', $extra = array(), $timeout = 60)
    {
        $urlset = parse_url($url);
        if (empty($urlset['path'])) {
            $urlset['path'] = '/';
        }
        if (!empty($urlset['query'])) {
            $urlset['query'] = "?{$urlset['query']}";
        }
        if (empty($urlset['port'])) {
            $urlset['port'] = $urlset['scheme'] == 'https' ? '443' : '80';
        }
        if (self::strexists($url, 'https://') && !extension_loaded('openssl')) {
            if (!extension_loaded("openssl")) {
                return self::error('请开启您PHP环境的openssl');
            }
        }
        if (function_exists('curl_init') && function_exists('curl_exec')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $urlset['scheme'] . '://' . $urlset['host'] . ($urlset['port'] == '80' ? '' : ':' . $urlset['port']) . $urlset['path'] . @$urlset['query']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            if ($post) {
                if (is_array($post)) {
                    $filepost = false;
                    foreach ($post as $name => $value) {
                        if (is_string($value) && substr($value, 0, 1) == '@') {
                            $filepost = true;
                            break;
                        }
                    }
                    if (!$filepost) {
                        $post = http_build_query($post);
                    }
                }
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            }
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSLVERSION, 1);
            if (defined('CURL_SSLVERSION_TLSv1')) {
                curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
            }
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
            if (!empty($extra) && is_array($extra)) {
                $headers = array();
                foreach ($extra as $opt => $value) {
                    if (self::strexists($opt, 'CURLOPT_')) {
                        curl_setopt($ch, constant($opt), $value);
                    } elseif (is_numeric($opt)) {
                        curl_setopt($ch, $opt, $value);
                    } else {
                        $opt = strtr($opt, ["_" => "-"]);
                        $headers[] = "{$opt}: {$value}";
                    }
                }
                if (!empty($headers)) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                }
            }
            $data = curl_exec($ch);
            $status = curl_getinfo($ch);
            $errno = curl_errno($ch);
            $error = curl_error($ch);
            curl_close($ch);
            if ($errno || empty($data)) {
                return self::error(1, $error);
            } else {
                return self::iHttpResponseParse($data);
            }
        }
        $method = empty($post) ? 'GET' : 'POST';
        $fdata = "{$method} {$urlset['path']}{$urlset['query']} HTTP/1.1\r\n";
        $fdata .= "Host: {$urlset['host']}\r\n";
        if (function_exists('gzdecode')) {
            $fdata .= "Accept-Encoding: gzip, deflate\r\n";
        }
        $fdata .= "Connection: close\r\n";
        if (!empty($extra) && is_array($extra)) {
            foreach ($extra as $opt => $value) {
                if (!self::strexists($opt, 'CURLOPT_')) {
                    $fdata .= "{$opt}: {$value}\r\n";
                }
            }
        }
        if ($post) {
            if (is_array($post)) {
                $body = http_build_query($post);
            } else {
                $body = urlencode($post);
            }
            $fdata .= 'Content-Length: ' . strlen($body) . "\r\n\r\n{$body}";
        } else {
            $fdata .= "\r\n";
        }
        if ($urlset['scheme'] == 'https') {
            $fp = fsockopen('ssl://' . $urlset['host'], $urlset['port'], $errno, $error);
        } else {
            $fp = fsockopen($urlset['host'], $urlset['port'], $errno, $error);
        }
        stream_set_blocking($fp, true);
        stream_set_timeout($fp, $timeout);
        if (!$fp) {
            return self::error(1, $error);
        } else {
            fwrite($fp, $fdata);
            $content = '';
            while (!feof($fp))
                $content .= fgets($fp, 512);
            fclose($fp);
            return self::iHttpResponseParse($content, true);
        }
    }

    public static function iHttpResponseParse($data, $chunked = false)
    {
        $rlt = array();
        $pos = strpos($data, "\r\n\r\n");
        $split1[0] = substr($data, 0, $pos);
        $split1[1] = substr($data, $pos + 4, strlen($data));

        $split2 = explode("\r\n", $split1[0], 2);
        preg_match('/^(\S+) (\S+) (\S+)$/', $split2[0], $matches);
        $rlt['code'] = isset($matches[2]) ? $matches[2] : 404;
        $rlt['status'] = isset($matches[3]) ? $matches[3] : 'Not Found';
        $rlt['responseline'] = @$split2[0];
        $header = explode("\r\n", @$split2[1]);
        $isgzip = false;
        $ischunk = false;
        foreach ($header as $v) {
            $row = explode(':', $v);
            $key = trim($row[0]);
            $value = trim($row[1]);
            if (is_array(@$rlt['headers'][$key])) {
                $rlt['headers'][$key][] = $value;
            } elseif (!empty(@$rlt['headers'][$key])) {
                $temp = $rlt['headers'][$key];
                unset($rlt['headers'][$key]);
                $rlt['headers'][$key][] = $temp;
                $rlt['headers'][$key][] = $value;
            } else {
                $rlt['headers'][$key] = $value;
            }
            if (!$isgzip && strtolower($key) == 'content-encoding' && strtolower($value) == 'gzip') {
                $isgzip = true;
            }
            if (!$ischunk && strtolower($key) == 'transfer-encoding' && strtolower($value) == 'chunked') {
                $ischunk = true;
            }
        }
        if ($chunked && $ischunk) {
            $rlt['content'] = self::iHttpResponseParseUnchunk($split1[1]);
        } else {
            $rlt['content'] = $split1[1];
        }
        if ($isgzip && function_exists('gzdecode')) {
            $rlt['content'] = gzdecode($rlt['content']);
        }

        $rlt['meta'] = $data;
        if ($rlt['code'] == '100') {
            return self::iHttpResponseParse($rlt['content']);
        }
        return $rlt;
    }

    public static function iHttpResponseParseUnchunk($str = null)
    {
        if (!is_string($str) or strlen($str) < 1) {
            return false;
        }
        $eol = "\r\n";
        $add = strlen($eol);
        $tmp = $str;
        $str = '';
        do {
            $tmp = ltrim($tmp);
            $pos = strpos($tmp, $eol);
            if ($pos === false) {
                return false;
            }
            $len = hexdec(substr($tmp, 0, $pos));
            if (!is_numeric($len) or $len < 0) {
                return false;
            }
            $str .= substr($tmp, ($pos + $add), $len);
            $tmp = substr($tmp, ($len + $pos + $add));
            $check = trim($tmp);
        } while (!empty($check));
        unset($tmp);
        return $str;
    }

    public static function error($errno, $message = '')
    {
        return array(
            'errno' => $errno,
            'message' => $message,
        );
    }

    /**
     * POST请求
     * @param $url
     * @param $param
     * @param $headers
     * @return array
     */
    public static function iHttpPost($url, $param, $headers = [])
    {
        $headers = array_merge(['Content-Type' => 'application/x-www-form-urlencoded'], $headers);
        return self::iHttpRequest($url, $param, $headers);
    }

    /**
     * GET请求
     * @param $url
     * @param $headers
     * @return array
     */
    public static function iHttpGet($url, $headers = [])
    {
        return self::iHttpRequest($url, '', $headers);
    }
}