<HTML>
<HEAD>
<TITLE>有返回值的函数</TITLE>
</HEAD>
<BODY>
<FONT SIZE=5>
<?
	function makeBold($inputText)		//定义function makeBold()函数
	{
		$boldedText = "<B>";
		$boldedText .= $inputText;
		$boldedText .= "</B>";
		return($boldedText);		//返回变量$boldedText
	}
	print("这行没有加重！！！<BR>\n");	//直接打印字符串	
	print(makeBold("这行被加重了！！！") . "<BR>\n");//调用function makeBold()函数
	print("这行没有加重！！！<BR>\n");	//直接打印字符串
?>
</SIZE>
</BODY>
</HTML>