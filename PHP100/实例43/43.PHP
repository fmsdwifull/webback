<HTML>
<HEAD>
<TITLE>访问文件常见属性</TITLE>
</HEAD>
<BODY>
<BR>
<?
	print("文件的所有者（UID 值）：");
	print(fileowner("data.txt")."<br>");
	print("文件的大小：");
	print(filesize("data.txt")."<br>");
	print("文件的类型：");
	print(filetype("data.txt")."<br>");
?>
</BODY>
</HTML>