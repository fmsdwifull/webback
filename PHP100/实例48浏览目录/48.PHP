<HTML>
<HEAD>
<TITLE>浏览目录</TITLE>
</HEAD>
<BODY>
<?
	// 使用表格浏览目录的结构
	print("<TABLE BORDER=\"1\">\n");
	// 创建表格的头
	print("<TR><font color='red'>\n");
	print("<TH>文件名</TH>\n");
	print("<TH>文件的大小</TH>\n");
	print("</font></TR>\n");
	$myDirectory = opendir(".");		// 建立操作目录的句柄 
	// 读出目录中的每一个子项
	while($entryName = readdir($myDirectory))
	{
		print("<TR>");
		print("<TD>$entryName</TD>");
		print("<TD ALIGN=\"right\">");
		print(filesize($entryName));
		print("</TD>");
		print("</TR>\n");
	}
	closedir($myDirectory);			// 关闭目录
	print("</TABLE>\n");
?>
</BODY>
</HTML>