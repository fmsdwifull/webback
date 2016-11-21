<HTML>
<HEAD>
<TITLE>访问文件时间属性</TITLE>
</HEAD>
<BODY>
<?
	$LastAccess = fileatime("data.txt");
	print("文件最后的存取时间为：");
	print(date("l F d, Y", $LastAccess));
	print("<br>");
?>
<?
	$LastA = filectime("data.txt");
	print("文件最后的改变时间：");
	print(date("l F d, Y", $LastA));
	print("<br>");
?>
<?
	$LastB = filemtime("data.txt");
	print("文件最后的修改时间：");
	print(date("l F d, Y", $LastB));
	print("<br>");
?>
</BODY>
</HTML>