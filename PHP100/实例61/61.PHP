<HTML>
<HEAD>
<TITLE>常用时间函数(一)</TITLE>
</HEAD>
<BODY>
<?
	print(date("h:i A l"));
	print("<BR>\n");
	print(date("F dS, Y"));
?>
<?
	$current_date = getdate(time());
	print("<hr>");
	printf("%d:%d:%d", 
		$current_date["hours"],
		$current_date["minutes"],
		$current_date["seconds"]);
?>
</BODY>
</HTML>