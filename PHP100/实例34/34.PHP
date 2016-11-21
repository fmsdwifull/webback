<HTML>
<HEAD>
<TITLE>获取数组中的元素</TITLE>
</HEAD>
<?
	$monthName = array(
	/*定义$monthName[1]到$monthName[12]*/
		1=>"January", "February", "March",
		"April", "May", "June", 
		"July", "August", "September", 
		"October", "November", "December",
	/*定义$monthName["Jan"]到$monthName["Dec"]*/
		"Jan"=>"January", "Feb"=>"February",
		"Mar"=>"March", "Apr"=>"April", 
		"May"=>"May", "Jun"=>"June", 
		"Jul"=>"July", "Aug"=>"August",
		"Sep"=>"September", "Oct"=>"October", 
		"Nov"=>"November", "Dec"=>"December",
	/*定义$monthName["Jan"]到$monthName["Dec"]*/
		"January"=>"January", "February"=>"February",
		"March"=>"March", "April"=>"April", 
		"May"=>"May", "June"=>"June", 
		"July"=>"July", "August"=>"August",
		"September"=>"September", "October"=>"October", 
		"November"=>"November", "December"=>"December"
		);
	/*打印相关的元素*/
	print("Month <B>5</B> is <B>" . $monthName[5]. "</B><BR>\n");
	print("Month <B>Aug</B> is <B>" . $monthName["Aug"] . "</B><BR>\n");
	print("Month <B>June</B> is <B>" . $monthName["June"] . "</B><BR>\n");
?>
</BODY>
</HTML>