<?php
    session_start();
	$timestampcc = time();
	$cc_nowtime = $timestampcc;
	if($_SESSION['cc_lasttime'] != null)
	{
		$cc_lasttime = $_SESSION['cc_lasttime'];
		$cc_times = $_SESSION['cc_times']+1;
		$_SESSION['cc_times'] = $cc_times;
		
		echo "���ô�����".$_SESSION['cc_times'];
		echo "\n";
		$secs = $cc_nowtime-$cc_lasttime;
		echo "����������".$secs;		
	}else{
		$cc_lasttime = $cc_nowtime;
		$cc_times = 1;
		$_SESSION['cc_times'] = $cc_times;
		$_SESSION['cc_lasttime'] = $cc_lasttime;
		echo "���ô�����".$_SESSION['cc_times'];
		echo "\n";
		$secs = $cc_nowtime-$cc_lasttime;
		echo "����������".$secs;
	} 
	if(($cc_nowtime-$cc_lasttime)<5)
	{
		//3����ˢ��5�����Ͽ���Ϊcc����
		if($cc_times>=2){
			echo 'ˢ��̫��!';
			exit;
		}
	}else{
		$cc_times = 0;
		$_SESSION['cc_lasttime'] = $cc_nowtime;
		$_SESSION['cc_times'] = $cc_times;
	} 
?>

