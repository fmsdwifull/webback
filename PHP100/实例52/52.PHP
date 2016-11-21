<HTML>
<HEAD>
<TITLE>数组排序的使用</TITLE>
</HEAD>
<BODY>
<?
	// 构造一个数组变量
	$users = array("bob"=>"Yobert",  
		"steve"=>"Btephen", 
		"jon"=>"Aonathon");
	
	for(reset($users); $index=key($users); next($users))
	{
		print("$index : $users[$index] <BR>\n");
	}	
	print("<hr>");
	// 使数组排序
	asort($users);

	// 打印排序后的数组
	for(reset($users); $index=key($users); next($users))
	{
		print("$index : $users[$index] <BR>\n");
	}
?>
</BODY>
</HTML>