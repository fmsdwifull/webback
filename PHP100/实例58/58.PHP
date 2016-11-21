<HTML>
<HEAD>
<TITLE>常用数学函数(一)</TITLE>
</HEAD>
<BODY>
<?
	print(abs(-13));//打印绝对值
?>
<?
	// 从 -1 到1打印acos函数的值
	print("<TABLE BORDER=\"1\">\n");
	print("<TR><TH>x</TH><TH>acos(x)</TH></TR>\n");
	for($index = -1; $index <= 1; $index += 0.25)
	{
		print("<TR>\n");
		print("<TD>$index</TD>\n");
		print("<TD>" . acos($index) . "</TD>\n");
		print("</TR>\n");
	}
	print("</TABLE>\n");
?>
<?
	//  从 -1 到 1打印asin函数的值
	print("<TABLE BORDER=\"1\">\n");
	print("<TR><TH>x</TH><TH>asin(x)</TH></TR>\n");
	for($index = -1; $index <= 1; $index += 0.25)
	{
		print("<TR>\n");
		print("<TD>$index</TD>\n");
		print("<TD>" . asin($index) . "</TD>\n");
		print("</TR>\n");
	}
	print("</TABLE>\n");
?>
</BODY>
</HTML>