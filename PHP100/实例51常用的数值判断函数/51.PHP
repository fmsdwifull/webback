<HTML>
<HEAD>
<TITLE>常用的数值判断函数</TITLE>
</HEAD>
<BODY>
<?
	//判断数组
	$colors = array("red", "blue", "green");
	if(is_array($colors))
	{
		print("colors is an array"."<br>");
	}
	//双精度数判断
	$Temperature = 15.23;
	if(is_double($Temperature))
	{
		print("Temperature is a double"."<br>");
	}
	//整数判断
	$PageCount = 2234;
	if(is_integer($PageCount))
	{
		print("$PageCount is an integer"."<br>");
	}
	//对象判断
	class widget
	{
		var $name;
		var $length;
	}
	$thing = new widget;
	if(is_object($thing))
	{
		print("thing is an object"."<br>");
	}
	//字符判断
	$Greeting = "Hello";
	if(is_string($Greeting))
	{
		print("Greeting is a string"."<br>");
	}
?>
</BODY>
</HTML>