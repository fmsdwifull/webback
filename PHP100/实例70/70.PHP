<HTML>
<HEAD>
<TITLE>对分查找法</TITLE>
</HEAD>
<BODY><?
	/*
	定义一个函数 
	*/
	function byName($left, $right)
	{
		return(strcmp($left[0], $right[0]));
	}

	/*
	** 创建数组：Name, Title, Wage
	*/
	$employee[] = array("tom, John", "Programmer", 20);
	$employee[] = array("jas, John", "Programmer", 20);
	$employee[] = array("june, John", "Programmer", 20);
	$employee[] = array("aili, John", "Programmer", 20);
	$employee[] = array("Doe, Jane", "Programmer", 20);
	$employee[] = array("Mann, Joe", "Manager", 35);
	$employee[] = array("Smith, John", "CEO", 50);
	$employee[] = array("Leeds, Al", "President", 100);

	/*
	** 排序
	*/
	usort($employee, "byName");

	/*
	** 查找对象
	*/
	$Name = "Mann, Joe";
	$lower_limit = 0;
	$upper_limit = count($employee) - 1;

	while($lower_limit < $upper_limit)
	{
		/*
		** 取得中间点
		*/
		$index = intval(($lower_limit + $upper_limit)/2);


		if(strcmp($employee[$index][1], $Name) > 0)
		{
			/*
			** 结果在上半部分
			*/
			$lower_limit = $index + 1;
		}
		elseif(strcmp($employee[$index][1], $Name) < 0)
		{
			/*
			** 结果在下半部分
			*/
			$upper_limit = $index - 1;
		}
		else
		{
			/*
			** 发现结果
		*/
			$lower_limit = $index;
			$upper_limit = $index;
		}
	}

	/*
	** 打印结果
	*/
	print("Mann, Joe 在数组中的位置："." $index<BR>\n");

?>
</BODY>
</HTML>