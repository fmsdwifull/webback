<HTML>
<HEAD>
<TITLE>调用文本文件内容</TITLE>
</HEAD>
<BODY>
<CENTER>
<?
	// 打开文件同时，打印每一行
	$myFile = file( "data.txt");
	for($index = 0; $index < count($myFile); $index++)
	{
		print($myFile[$index]."<BR>");
	}
?>
</CENTER>
</BODY>
</HTML>