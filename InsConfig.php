<?php
/**
 * 配置类
 *
 * @author JQ.Feng
 * @since 1.0, 2024-07-08 13:15:00
 */
class InsConfig{
	//网关地址
	private $serverUrl = "https://api.inspay.jp";

	//开放平台key
	private $appKey = "你的appKey";

	//私钥
	private $secret = "你的secret";

	//报文格式，推荐：json
	private $format = "json";

	//签名算法类型
	private $signMethod = "HMAC-SHA1";

	//字符串编码，推荐：utf-8
	private $charset = "UTF-8";

	private $version = "v1";

	public function getServerUrl() {
        return $this->serverUrl;
    }

    public function setServerUrl($serverUrl) {
        $this->serverUrl = $serverUrl;
    }

    public function getAppkey(){
    	return $this->appKey;
    }

    public function setAppkey($appKey){
    	$this->appKey = $appKey;
    }

    public function getSecret(){
    	return $this->secret;
    }

    public function setSecret($secret){
    	$this->secret = $secret;
    }

    public function getFormat(){
    	return $this->format;
    }

    public function setFormat($format){
    	$this->format = $format;
    }

    public function getSignMethod(){
    	return $this->signMethod;
    }

    public function setSignMethod($signMethod){
    	$this->signMethod = $signMethod;
    }

    public function getCharset(){
    	return $this->charset;
    }

    public function setCharset($charset){
    	$this->charset = $charset;
    }

    public function getVersion(){
    	return $this->version;
    }

    public function setVersion($version){
    	$this->version = $version;
    }

    

}