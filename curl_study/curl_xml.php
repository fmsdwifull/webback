<?php

	$ch = curl_init(); 
	$timeout = 5; 
	$url="http://www.baidu.com";
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout); 
	$contents = curl_exec($ch);
	echo $contents;

/*
	
//首先检测是否支持curl
if (!extension_loaded("curl")) {   
trigger_error("对不起，请开启curl功能模块！", E_USER_ERROR);
}
//构造xml
$xmldata="<?xml version='1.0' encoding='UTF-8'?><group><name>张三</name><age>22</age></group>";
//初始一个curl会话
$curl = curl_init();
//设置url
curl_setopt($curl, CURLOPT_URL,"http://localhost/dealxml.php");
//设置发送方式：
postcurl_setopt($curl, CURLOPT_POST, true);
//设置发送数据
curl_setopt($curl, CURLOPT_POSTFIELDS, $xmldata);
//抓取URL并把它传递给浏览器
//$contents=curl_exec($curl);
curl_exec($curl);
//关闭cURL资源，并且释放系统资源
curl_close($curl);
*/

?>