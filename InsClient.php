<?php
require_once 'HttpClient.php';
require_once 'InsSigner.php';
require_once 'InsConfig.php';
require_once 'InsUtils.php';

/**
 * HTTP请求客户端
 *
 * @author JQ.Feng
 * @since 1.0, 2024-07-08 13:15:00
 */
class InsClient{
	private $config = null;
	function __construct() {
        //根据参数个数和参数类型 来做相应的判断
        if(func_num_args()==1 && func_get_arg(0) instanceof InsConfig){
            $this->config = func_get_arg(0);
         }
     }    

	public function execute($request){

		//获取业务参数
        $apiParams = $request->getApiParas();

		//组装公共参数
		$apiParams["AppKey"] = $this->config->getAppkey();
		$apiParams["SignMethod"] = $this->config->getSignMethod();
		$insUtils = new insUtils();
		$apiParams["Timestamp"] = $insUtils->getTimestamp();
		$apiParams["Nonce"] = $insUtils->generateUUID();
		$iv = null;
        if (!$insUtils->checkEmpty($request->getApiVersion())) {
            $iv = $request->getApiVersion();
        } else {
            $iv = $this->config->getVersion();
        }
		$apiParams["Version"] = $iv;

		$insSigner = new InsSigner();

		$apiParams["Sign"] = $insSigner->generateSign($apiParams,$this->config->getSignMethod(),
                                            $this->config->getSecret(), $this->config->getCharset());

		$methodName = $request->getApiMethodName();
		$requestUrl = $this->config->getServerUrl() . $methodName;


        //发起HTTP请求
        try {
        	$httpClient = new HttpClient();
            $resp = $httpClient->curl($requestUrl, $apiParams);
            return $resp;
        } catch (Exception $e) {
            $this->logCommunicationError($methodName, $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
            return false;
        }

	}


    protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt)
    {
        $logData = array(
            date("Y-m-d H:i:s"),
            $apiName,
            $this->config->getAppkey(),
            PHP_OS,
            $requestUrl,
            $errorCode,
            str_replace("\n", "", $responseTxt)
        );

        echo json_encode($logData);
    }


	
}
