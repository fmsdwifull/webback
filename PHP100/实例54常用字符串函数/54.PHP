<HTML>
<HEAD>
<TITLE>常用字符串函数(一)</TITLE>
</HEAD>
<BODY>
<?
	$first = "abc";
	$second = "aBc";
	if(strcmp($first, $second) == 0)//字串比较
	{
		print("字符串相等:"."<hr>");
	}
	else
	{
		print("字符串不相等"."<hr>");
	}
?>
<?
	print("a short string ".strlen("a short string")."<hr>");//字串长度
?>
<?
	$text = "hello world";
	print(strpos($text, "w")."<hr>");//寻找字串中某字元最先出现处
?>
</BODY>
</HTML>