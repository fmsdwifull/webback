<HTML>
<HEAD>
<TITLE>打开本地或者远程文件</TITLE>
</HEAD>
<BODY>
<?
	print("<H3>通过http协议打开文件</H3>\n");
	// 通过 http 协议打开文件
	if(!($myFile = fopen("http://xlj/php/jiang/data.txt", "r")))
	{
		print("文件不能打开");
		exit;
	}
	while(!feof($myFile))				//循环
	{
							// 按行读取文件中的内容
		$myLine = fgetss($myFile, 255);
		print("$myLine <BR>\n");
	}
	// 关闭文件的句柄
	fclose($myFile);
?>
</BODY>
</HTML>