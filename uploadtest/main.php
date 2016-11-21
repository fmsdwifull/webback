<?php
	/*解析安卓apk包中的压缩XML文件，还原和读取XML内容
	依赖功能：需要PHP的ZIP包函数支持。*/
	include('./Apkparser.php');
	$appObj  = new Apkparser(); 
	$targetFile = "./b.apk";//apk所在的路径地址
	$res   = $appObj->open($targetFile);
	echo $appObj->getAppName()."</br>";     // 应用名称
	echo  $appObj->getPackage()."</br>";     // 应用包名
	echo $appObj->getVersionName()."</br>";   // 版本名称
	echo $appObj->getVersionCode()."</br>";   // 版本代码
?>