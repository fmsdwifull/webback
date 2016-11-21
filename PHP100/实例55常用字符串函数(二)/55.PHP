<HTML>
<HEAD>
<TITLE>常用字符串函数(二)</TITLE>
</HEAD>
<BODY>
<?
	$text = "My dog's name is Angus.";
	//print Angus
	print(substr($text, 17, 5)."<hr>");//取出子串
?>
<?
	//切开字串
	// create a demo string
	$line = "leon\tatkinson\tleon@clearink.com";

	// loop while there are still tokens
	for($token = strtok($line, "\t");
		$token != "";
		$token = strtok("\t"))
	{
		print("token: $token<BR>\n");
	}
?>
<?
	//传回字串中某字串开始处至结束的字串
	$text = "Although this is string, it's not very long.";
	print("<hr>".strstr($text, ",")); 
?>
</BODY>
</HTML>