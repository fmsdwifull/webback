<HTML>
<HEAD>
<TITLE>得到100个随机数字</TITLE>
</HEAD>
<BODY>
<?
	/*
	** 返回一个随机数字 
	*/
	function RandomNumber($new_seed="")
	{
		static $seed;
		$constant = bcadd(bcpow("2", "13"), "1");
		$prime = 37;
		$max_value = bcpow("2", "50", $scale);
		/*
		** 如果得到参数
		*/
		if($new_seed != "")
		{
			$seed = $new_seed;
		}
		
		/*
		** 如果没有，则使用时间戳
		*/
		if($seed == "")
		{
			$seed = strval(time());
		}

		/*
		** 得到下一个数值
		*/	
		$seed = bcmul($constant, $seed);
		$seed = bcadd($seed, $prime);
		$seed = bcmod($seed, $max_value);
		
		return($seed);		
	}

	/*
	** 设置 BC Math 函数
	*/
	bcscale(0);

	/*
	** 得到100个数字
	*/
 	for($index = 0; $index < 100; $index++)
 	{
 		print(RandomNumber() . "<BR>\n");
 	}
?>
</BODY>
</HTML>