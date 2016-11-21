<HTML>
<HEAD>
<TITLE>实现背景颜色的改变</TITLE>
</HEAD>
<BODY>
<?
	print("<HTML>\n");
	print("<HEAD>\n");
	print("<TITLE>改变背景颜色</TITLE>\n");
	print("</HEAD>\n");
	/* 
	** 第一次被浏览的时候
	** 使用白色为默认的颜色。
	*/
	if($inputColor == "")
	{
		$inputColor = "FFFFFF";
	}
	/* 
	** 使用背景颜色打开网页 
	*/
	print("<BODY BGCOLOR=\"#$inputColor\">\n");
	/* 
	** 表单提交到本页 
	*/
	print("<FORM ACTION=\"37.php\" METHOD=\"post\">\n");
	/* 
	** 得到颜色的数据
	*/
	print("<B>请填写HTML颜色代码:</B> ");
	print("<INPUT ");
	print("TYPE=\"text\" ");
	print("NAME=\"inputColor\" ");
	print("VALUE=\"$inputColor\">\n");
	/* 
	** 提交的按钮 
	*/
	print("<INPUT ");
	print("TYPE=\"submit\" ");
	print("NAME=\"Submit_Button\" ");
	print("VALUE=\"提交颜色\">\n");
	print("</FORM>\n");
	print("</BODY>\n");
	print("</HTML>\n");
?>
</BODY>
</HTML>