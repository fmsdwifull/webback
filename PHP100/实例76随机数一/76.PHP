<HTML>
<HEAD>
<TITLE>得到十个随机数</TITLE>
</HEAD>
<BODY>
<BR>
<FONT SIZE=5>
<?
	/*
	** 生成一个随机数
	*/
	srand(time());
	/*
	** 从1到100中取得随机数
	*/
	for($index = 0; $index < 10; $index++)
	{
		$number = (rand()%100)+1;
		print("$number   \n");
	}
?>
</FONT>
</BODY>
</HTML>