<HTML>
<HEAD>
<TITLE>编码和解码函数</TITLE>
</HEAD>
<BODY>
<?
	$data = "VGhpcyBpcyBhIAptdWx0aS1saW5lIG1lc3NhZ2UK";//解码前的值
	print ($data);
	print(base64_decode($data));			   //进行解码
?>
<?
	print("<hr>");
	$text = "这是一个多行信息\n";
	print ($text);
	print(base64_encode($text));			   //编码
?>
</BODY>
</HTML>