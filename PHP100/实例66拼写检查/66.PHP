<HTML>
<HEAD>
<TITLE>拼写检查</TITLE>
</HEAD>
<BODY>
<?
	$aspell_link=aspell_new("english");//载入一个新的字典
	if (aspell_check($aspell_link,"testt"))	//检查testt的拼写
		{
    		echo "testt:正确的拼写";
		} 
	else 	
		{
    		echo "testt :是一个错误的拼写";
    		print("<hr>");
		}
	if (aspell_check($aspell_link,"test"))	//检查test的拼写
		{
    		echo "test :是一个正确的拼写";
		} 
	else 	
		{
    		echo "test:是一个错误的拼写";
		}
?>
</BODY>
</HTML>