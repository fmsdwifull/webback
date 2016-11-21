<HTML>
<HEAD>
<TITLE>日期检查函数</TITLE>
</HEAD>
<BODY>
<?
	if(checkdate(2,18,1970))//检查日期函数
	{
		print("2,18,1970  :"."这是一个正确的日期格式");
	}
	else
	{
		print("这不是一个正确的日期格式");
	}
	if(checkdate(52,18,1970))//检查日期函数
	{
		print("这是一个正确的日期格式");
	}
	else
	{
		print("52,18,1970  :"."这不是一个正确的日期格式");
	}
?>
</BODY>
</HTML>