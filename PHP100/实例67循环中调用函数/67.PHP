<HTML>
<HEAD>
<TITLE>循环中调用函数</TITLE>
</HEAD>
<BODY>
<?
	function calculate($period)	//定义函数
	{
		return(cos(time()%$period));
	}
	$start = time();		//循环前

	for($index = 0; $index < 2000; $index++)
	{
		$value += calculate(360);
	}
	$finish = time();		//循环后
	print("这次循环使用的时间为：" . "<br>".($finish - $start) . " seconds<BR>\n");
	print ("<hr>");
	print ("value的值为：".$value);
?>
</BODY>
</HTML>