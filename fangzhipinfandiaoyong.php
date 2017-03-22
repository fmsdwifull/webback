<?php
    session_start();
	$timestampcc = time();
	$cc_nowtime = $timestampcc;
	if($_SESSION['cc_lasttime'] != null)
	{
		$cc_lasttime = $_SESSION['cc_lasttime'];
		$cc_times = $_SESSION['cc_times']+1;
		$_SESSION['cc_times'] = $cc_times;
		
		echo "调用次数：".$_SESSION['cc_times'];
		echo "\n";
		$secs = $cc_nowtime-$cc_lasttime;
		echo "调用秒数：".$secs;		
	}else{
		$cc_lasttime = $cc_nowtime;
		$cc_times = 1;
		$_SESSION['cc_times'] = $cc_times;
		$_SESSION['cc_lasttime'] = $cc_lasttime;
		echo "调用次数：".$_SESSION['cc_times'];
		echo "\n";
		$secs = $cc_nowtime-$cc_lasttime;
		echo "调用秒数：".$secs;
	} 
	if(($cc_nowtime-$cc_lasttime)<5)
	{
		//3秒内刷新5次以上可能为cc攻击
		if($cc_times>=2){
			echo '刷新太快!';
			exit;
		}
	}else{
		$cc_times = 0;
		$_SESSION['cc_lasttime'] = $cc_nowtime;
		$_SESSION['cc_times'] = $cc_times;
	} 
?>

