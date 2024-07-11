<?php
require_once '../InsClient.php';
require_once '../InsConfig.php';
require_once '../request/DataQueryRequest.php';

//配置
$config = new InsConfig();

$insClient = new insClient($config);

$request = new DataQueryRequest();
$request->setStartTime("2024-06-05 00:00:00");
$request->setEndTime("2024-06-05 23:57:00");
$request->setPageIndex(3);
$request->setPageSize(2);

$response = $insClient->execute($request);
echo var_dump($response),PHP_EOL;