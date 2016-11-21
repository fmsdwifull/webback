<HTML>
<HEAD>
<TITLE>常用数组函数</TITLE>
</HEAD>
<BODY>
<?
	$colors = array("red", "green", "blue","yellow");
	print("数组的个数：".count($colors)."<br>");//数组的个数
	print("数组的当前值：".current($colors)."<br>");//当前的值
	end($colors);
	print("数组的最后一个的值：".current($colors)."<br>");
	print("<hr>");
	$slice = each($colors);//
	print("each()函数的使用："."<br>");
	print($slice[0] . "====" . $slice[1] . "<BR>\n");
	print($slice['key'] . "====" . $slice['value'] . "<BR>\n");
?>
</BODY>
</HTML>