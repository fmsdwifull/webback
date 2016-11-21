<HTML>
<HEAD>
<TITLE>创建目录函数</TITLE>
</HEAD>
<BODY>
<?
	if(mkdir("myDir1", 0777))		//创建目录的函数
	{
		print("目录创建成功");		//目录建立成功
	}
	else
	{
		print("目录建立失败!");		//目录建立失败
	}
?>
</BODY>
</HTML>