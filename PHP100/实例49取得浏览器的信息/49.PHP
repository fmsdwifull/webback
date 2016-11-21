<HTML>
<HEAD>
<TITLE>取得浏览器的信息</TITLE>
</HEAD>
<BODY>
<?php
function list_array ($array) 		//定义函数
	{
		 while (list ($key, $value) = each ($array)) 
		 {
		 $str= "<b>$key:</b> $value<br>\n";
		 }
	 	return $str;
	}
 echo "$HTTP_USER_AGENT<hr>\n";
 $browser = get_browser();
 print("<br>");
 echo list_array ((array) $browser);
?>
</BODY>
</HTML>