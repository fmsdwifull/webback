<HTML>
<HEAD>
<TITLE>³ÌÐòÔÝÍ£º¯Êý</TITLE>
</HEAD>
<BODY>
<?
	print(microtime());
	sleep(10);		//³ÌÐòÔÝÍ£10s
	print("<br>\n");
	print(microtime());
	print("<hr>");
	print(microtime());
	usleep(30);		//ÔÝ¶¨30ms
	print("<br>\n");
	print(microtime());
?>
</BODY>
</HTML>