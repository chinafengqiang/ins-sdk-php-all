<?php
/**
 * Ins API: /open/data/pps6700/query
 *
 * @author JQ.Feng
 * @since 1.0, 2024-07-08 13:15:00
 */
class DataQueryRequest{
	private $apiParas = array();
	private $apiVersion = "v1";
	

	public function getApiMethodName()
	{
		return "/open/data/pps6700/query";
	}

	public function getApiParas()
	{
		return $this->apiParas;
	}


	public function getApiVersion()
	{
		return $this->apiVersion;
	}

	//设置业务参数
	public function setStartTime($startTime){
		$this->apiParas["startTime"] = $startTime;
	}

	public function setEndTime($endTime){
		$this->apiParas["endTime"] = $endTime;
	}

	public function setDataType($dataType){
		$this->apiParas["dataType"] = $dataType;
	}

	public function setSerialNumber($serialNumber){
		$this->apiParas["serialNumber"] = $serialNumber;
	}

	public function setPageIndex($pageIndex){
		$this->apiParas["pageIndex"] = $pageIndex;
	}

	public function setPageSize($pageSize){
		$this->apiParas["pageSize"] = $pageSize;
	}



}