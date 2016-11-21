<HTML>
<HEAD>
<TITLE>使用文件包含</TITLE>
</HEAD>
<BODY>
<?
	/*
	** 取得月份名称数组
	*/
	include("40-2.php");		//这里包含文件
	//print("这里时被包含进来的");
	echo("Month 5 is " . $monthName[5] . "<BR>\n");
	echo("Month Aug is " . $monthName["Aug"] . "<BR>\n");
	print("Month June is " . $monthName["June"] . "<BR>\n");
	MyCounter(999)//这里调用包含文件中的函数
?>
</BODY>
</HTML>