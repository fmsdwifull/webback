<HTML>
<HEAD>
<TITLE>常用时间函数(二)</TITLE>
</HEAD>
<BODY>
<?
	print("pi=".pi());
	print("<br>");
	print("sin(0.5 * pi())=".sin(0.5 * pi()));
	print("<br>");
	print("cos(2 * pi())=".cos(2 * pi()));
	print("<br>");
	
	//打印从1到100中间的10个随机的数
	for($index = 0; $index < 10; $index++)
	{
		print(rand(1,100) . "<BR>\n");
	}
?>
</BODY>
</HTML>