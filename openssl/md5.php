<?php
	$todyday = date("Ymd",time());
	$keystr = "eroadcar";
	$authstr = $todyday.$keystr;
	echo  $authstr;
	echo "\n";
	$decrypt = md5($authstr);
	echo $decrypt;
?>