<?php
/**
 * 签名类
 *
 * @author JQ.Feng
 * @since 1.0, 2024-07-08 13:15:00
 */
class InsSigner{
	// 表单提交字符集编码
    public $postCharset = "UTF-8";
	private $secret;


	public function generateSign($params, $signType = "HMAC-SHA1", $secret, $charset)
	{
	      $params = array_filter($params);
	      $this->secret = $secret;
	      $this->postCharset = $charset;
	      $sign = $this->sign($this->getSignContent($params), $signType);
	      //转大写
	      return strtoupper($sign);
	}

	public function getSignContent($params)
	{
	        ksort($params);
	        unset($params['sign']);

	        $stringToBeSigned = "";
	        $i = 0;
	        foreach ($params as $k => $v) {
	            if ("@" != substr($v, 0, 1)) {

	                // 转换成目标字符集
	                $v = $this->characet($v,$this->postCharset);

	                if ($i == 0) {
	                    $stringToBeSigned .= "$k" . "=" . "$v";
	                } else {
	                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
	                }
	                $i++;
	            }
	        }

	        unset ($k, $v);
	        return $stringToBeSigned;
	}

	protected function sign($data, $signMethod = "HMAC-SHA1"){
		$hashfunc = "sha1";
		if ("HMAC-SHA256" == $signMethod) {
            $hashfunc = "sha256";
        } 
        $signature = "";  
        $key = $this->secret;

        //$data = mb_convert_encoding($data, "UTF-8");  

        if (function_exists('hash_hmac')) {
          $signature = bin2hex(hash_hmac($hashfunc, $data,$key, true));
        } else {
          $blocksize = 64;  
          if (strlen($key) > $blocksize) {  
             $key = pack('H*', $hashfunc($key));  
          }  
          $key = str_pad($key, $blocksize, chr(0x00));  
          $ipad = str_repeat(chr(0x36), $blocksize);  
          $opad = str_repeat(chr(0x5c), $blocksize);  
          $hmac = pack(  
                 'H*', $hashfunc(  
                         ($key ^ $opad) . pack(  
                                 'H*', $hashfunc(  
                                         ($key ^ $ipad) . $str  
                                 )  
                         )  
                 )  
          );  
         $signature = bin2hex($hmac);
       }  
       return $signature;  
	}

	  /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset)
    {

        if (!empty($data)) {
             $data = mb_convert_encoding($data, $targetCharset);
        }


        return $data;
    }
}