<HTML>
<HEAD>
<TITLE>PHP判断文件是否存在</TITLE>
</HEAD>
<BODY>
<?
print("data.txt文件是否存在？"."<br>");
	if(file_exists("data.txt"))
	{
		print("这个文件存在");		//文件存在
		print(fileinode("data.txt"));
	}
	else
	{
		print("文件不存在");		//文件不存在
	}
?>
</BODY>
</HTML>