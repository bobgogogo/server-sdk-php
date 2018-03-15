<?php
namespace RC\HTTP;

/**
* 请求类
*/
final class Request
{
	public static function postCurl($url,$data=[],$type=1)
	{
        $header = self::getAuthHeader($type);
        $url = RURL.$url.'.json';
		$header_status = 0;
		foreach ($header as $http) {
			if (strpos($http,'www')) {
				$header_status = 1;
				break;
			}
		}
		if ($header_status) {
			//x-www-form-urlencoded 方法 POST 数据
            $data = http_build_query($data);
            $data = preg_replace('/%5B(?:[0-9]|[1-9][0-9]+)%5D=/', '=', $data);
		} else {
			//json 方法 POST 数据
			$data = json_encode($data);
		}
		$ch = curl_init();
       
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_USERAGENT, "curl/7.19.7 (x86_64-redhat-linux-gnu) libcurl/7.19.7 NSS/3.15.3 zlib/1.2.3 libidn/1.18 libssh2/1.4.2");

        $strResult = curl_exec($ch);
        $rInfo = curl_getinfo($ch);
        curl_close($ch);
        if ($result == true){
            $str = json_decode($strResult, true);
            if (is_null($str)){
                return $strResult;
            }
            return $str;
        }
        if ($rInfo['http_code'] == '200') {
            $arrResult = json_decode($strResult, true);
        } else {
            return false;
        }
        return $arrResult;
	}

/**
* 鉴权
*/
    public static function getAuthHeader($status=1)
    {
        // 重置随机数种子。
        srand((double)microtime()*1000000);
        $appKey = APPKEY;
        $appSecret = APPSECRET; // 开发者平台分配的 App Secret。
        $nonce = rand(); // 获取随机数。
        $timestamp = time()*1000; // 获取时间戳（毫秒）。
        $signature = sha1($appSecret.$nonce.$timestamp);
        $header = [
            "App-Key:{$appKey}",
            "Nonce:{$nonce}",
            "Timestamp:{$timestamp}",
            "Signature:{$signature}"
        ];
        if ($status==1) {
            $header[] = 'Content-Type: application/x-www-form-urlencoded';
        } else if ($status==2) {
            $header[] = 'Content-Type: application/json; charset=utf-8';
        } else {
            $header[] = $status;
        }
        return $header;
    }
}