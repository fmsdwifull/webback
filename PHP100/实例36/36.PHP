<HTML>
<HEAD>
<TITLE>PHP 4.0实现表格状打印</TITLE>
</HEAD>
<BODY>
<?
	/* 
	** 数据表格化 
	*/

	print("<TABLE bgcolor='ffccoo' BORDER=\"1\">\n"); // 表格开始
	

	for($Row=1; $Row <= 12; $Row ++)
	{
		print("<TR>\n"); // 开始行

		// do each column
		for($Column=1; $Column <= 12; $Column ++)
		{
			print("<TD>");//开始列
			print($Row * $Column);//表格元素乘积
			print("</TD>");
		}

		print("</TR>\n"); // 行结束

	}
	
	print("</TABLE>\n"); // 表格结束

?>
</BODY>
</HTML>