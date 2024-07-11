<?php

/**
 * 工具类
 *
 * @author JQ.Feng
 * @since 1.0, 2024-07-08 13:15:00
 */
class InsUtils{
	//判断空值
	public function checkEmpty($value)
    {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }

    //获取时间戳（毫秒）
    public function getTimestamp(){
    	$microtime = microtime();
		$timestamp = substr($microtime, 11) * 1000;
		return $timestamp;
    }

    //生成uuid
    public function generateUUID() {
	    $id = uniqid('', true);
	    $uuid = md5($id);
	    return $uuid;
	}
}