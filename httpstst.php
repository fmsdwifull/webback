<?php
    /*
	$url = 'http://www.jb51.net';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($curl);
	curl_close($curl);
	var_dump($data);
	*/
	$url = 'https://www.jb51.net';
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	$data = curl_exec($curl);
	curl_close($curl);
	var_dump($data);	
?>