<?php 

	header("Content-Type:text/html;charset=utf-8");
	if($_post['username'] = 'admin') 
	{ 
		session_start();
		echo session_id();
		$_SESSION['name']="张三";
		echo $_SESSION['name'];
		// 输出 08nr1fav9jqs2pdi5qlpsmd247
		//setcookie('haha','gogogo'); 
		//header("location:index.php"); 
	} 
?>