<HTML>
<HEAD>
<TITLE>常用字符串函数(三)</TITLE>
</HEAD>
<BODY>
<?
	//颠倒字串
	print("abcdefg  颠倒  ");
	print(strrev("abcdefg")."<hr>");

	//小写字串
	print("小写: ".strtolower("Hello World")."<hr>");

	//大写字串
	print("大写: ".strtoupper("Hello World")."<hr>");

	//去空格
	$text = "     whitespace      ";
	print("\"" . trim($text) . "\"");
?>
</BODY>
</HTML>