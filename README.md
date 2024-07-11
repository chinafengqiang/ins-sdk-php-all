欢迎使用 Inspiry SDK for PHP 。

Inspiry SDK for PHP让您不用复杂编程即可访Inspiry开放平台开放的各项能力，SDK可以自动帮您满足能力调用过程中所需的证书校验、加签、验签、发送HTTP请求等非功能性要求。

这里向您介绍如何获取 Inspiry SDK for PHP 并开始调用。
如果您在使用 Inspiry SDK for PHP 的过程中遇到任何问题，欢迎在当前 GitHub [提交 Issues](https://github.com/chinafengqiang/ins-sdk-php-all/issues/new)。


## 环境要求
1. Inspiry SDK for PHP 需要 PHP 5.5 以上的开发环境。

2. 使用 Inspiry SDK for PHP 之前 ，您需要先获取AppKey、Secret等。

3. 准备工作完成后，注意保存AppKey、Secret等信息，后续将作为使用SDK的输入。

## 快速使用

以下这段代码示例向您展示了使用Inspiry SDK for PHP调用一个API的4个主要步骤：

1. 设置InsConfig调用参数,包括ServerUrl、AppKey、Secret。

2. 创建InsClient实例并初始化。

3. 创建API请求对象并设置request参数。

4. 发起请求并处理响应或异常。

```php

<?php
require_once '../InsClient.php';
require_once '../InsConfig.php';
require_once '../request/DataQueryRequest.php';

/**
 * 配置
 * 
 * InsConfig.php中设置ServerUrl、AppKey、Secret
 *
 * $serverUrl = "你调用环境的地址"
 * $appKey = "你的appKey";
 * $secret = "你的secret";
 *
 */
$config = new InsConfig();

//创建请求类
$insClient = new insClient($config);

//设置API请求参数
$request = new DataQueryRequest();
$request->setStartTime("2024-06-05 00:00:00");
$request->setEndTime("2024-06-05 23:57:00");
$request->setPageIndex(3);
$request->setPageSize(2);

//发起请求并处理响应或异常
$response = $insClient->execute($request);
echo $response;

```
## 文档
[SDK文档首页](https://)


## 问题
如果您在使用 Inspiry SDK for PHP 的过程中遇到任何问题，欢迎在当前 GitHub [提交 Issues](https://github.com/chinafengqiang/ins-sdk-php-all/issues/new)。

## 变更日志
每个版本的详细更改记录在[变更日志](./CHANGELOG)中。

## 相关

* [Inspiry开放平台文档中心](https://)


## 许可证
[Apache License ](http://www.apache.org/licenses/)