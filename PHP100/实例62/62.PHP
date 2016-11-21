<HTML>
<HEAD>
<TITLE>常用时间函数(二)</TITLE>
</HEAD>
<BODY>
<?
	print("开始时间:". microtime() . "<BR>\n");

	for($index = 0; $index < 10; $index++)
	{
		print("tick ");
	}
	print("<br>"."停止: " . microtime() . "<BR>\n");
?>
<?
	$CurrentHour = date("h");

	print("从现在开始50小时以后为: ");
	print(date("h:i A l F dS, Y",
		mktime($CurrentHour+50)));
	print("<BR>\n");
?>
<?
	$CurrentTime = time();

	print($CurrentTime);
?>
</BODY>
</HTML>