		 <?
	$URL = "http://www.microsoft.com/";

	//start HTML page
	print("<HTML>\n");
	print("<HEAD>\n");
	print("<TITLE>取得页面的链接</TITLE>\n");
	print("</HEAD>\n");
	
	print("<BODY>\n");

	$page = fopen($URL, "r");//打开URL

	print("链接 $URL<BR>\n");
	print("<UL>\n");

	while(!feof($page))//在页面中循环
	{
		$line = fgets($page, 255);
		while(ereg("HREF=\"[^\"]*\"", $line, $match))
		{
			//打印出URL链接
			print("<Li>");
			print($match[0]);
			print("<BR>\n");
		}
	}

	print("</UL>\n");

	fclose($page);

	//关闭页面
	print("</BODY>\n");
	print("</HTML>\n");
?>