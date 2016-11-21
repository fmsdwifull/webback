<?
	// HTML文档开始
	print("<HTML>\n");
	// 编写头文件
	print("<HEAD>\n");
	print("<TITLE>");
	print("查看句中单词的个数");
	print("</TITLE>\n");
	print("</HEAD>\n");
	// 编写HTML主体
	print("<BODY>\n");
	/*
	** 如果得到提交的语句则执行下面的语句
	*/
	if(isset($sentence))
	{
		print("<B>得到的语句:</B>");
		print("$sentence<BR><BR>\n");
		$separators = " ";
		//得到每个单词
		for($token = strtok($sentence, $separators);
			$token;
			$token = strtok($separators))
		{
			// 计算每个单词
			$word_count[$token]++;
			$total++;
		}
		//分成数组
		arsort($word_count);
		print("<B>找到$total 个单词</B>\n");
		print("<UL>\n");
		while(list($key, $value) = each($word_count))
		{
			print("<LI>$key ($value)\n");	
		}
		print("</UL>\n");
	}

	print("<FORM ACTION=\"77.php\">\n");
	print("<INPUT NAME=\"sentence\" SIZE=\"10\">\n");
	print("<INPUT TYPE=\"submit\" VALUE=\"提交\">\n");
	print("</FORM>\n");
	print("</BODY>\n");
	// End HTML document
	print("</HTML>\n");
?>