<?
	/*
	** 这个程序将检测一个邮政编码，必须是
	** 6位的数字
	*/
	//HTML页面开始
	print("<HTML>\n");
	print("<HEAD>\n");
	print("<TITLE>检查一个邮政编码</TITLE>\n");
	print("</HEAD>\n");
	print("<BODY>\n");
	/*
	** 如果得到一个邮政编码
	*/
	if(isset($zip))
	{
		if(ereg("^([0-9]{6})(-[0-9]{5})?$", $zip))
		{
			print("$zip 是一个正确的邮政编码。<BR>\n");
		}
		else
		{
			print("$zip <B>不是</B> 一个正确的邮政编码<BR>\n");
		}
	}
	//表单开始
	print("<FORM ACTION=\"2.php\">\n");
	print("<INPUT TYPE=\"text\" NAME=\"zip\">\n");
	print("<INPUT TYPE=\"submit\">\n");
	print("</FORM>\n");
	//关闭网页
	print("</BODY>\n");
	print("</HTML>\n");
?>
