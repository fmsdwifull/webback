<?php 

	header("Content-Type:text/html;charset=utf-8");
	if($_post['username'] = 'admin') 
	{ 
		setcookie('haha','gogogo'); 
		header("location:index.php"); 
	} 
?>