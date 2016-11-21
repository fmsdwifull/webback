<HTML>
<HEAD>
<TITLE>判断整数</TITLE>
</HEAD>
<BODY>
<?
	function checkInteger($Number)
	{
		if($Number > 1)
		{
			/* 整数减1仍然是整数 */
			return(checkInteger($Number-1));
		}
		elseif($Number < 0)
		{
			/* 对于一个负数，*/
			/* 可以分析它的绝对值*/
			return(checkInteger((-1)*$Number-1));//取绝对值，把负数按整数分析
		}
		else
		{
			if(($Number > 0) AND ($Number < 1))
			{
				return("当然不是");
			}
			else
			{
				/* 0 和 1 是整数       */
				/* 根据相关数学定义 */
				return("是的");
			}
		}
	}
	print("<B>0是整数吗？</B>" . 
		checkInteger(0) . "<BR>\n");
	print("<B>7是整数吗？</B> " . 
		checkInteger(7) . "<BR>\n");
	print("<B>3.5呢？</B>" . checkInteger(3.5) . "<BR>\n");
	print("<B>那么-5呢？</B>" . checkInteger(-5) . "<BR>\n");
	print("<B>还有-9.2？</B>" . checkInteger(-9.2) . "<BR>\n");
?>
</BODY>
</HTML>