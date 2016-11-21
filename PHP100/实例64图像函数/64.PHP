<HTML>
<HEAD>
<TITLE>图像函数</TITLE>
</HEAD>
<BODY>
<img src="64.jpg">
<br>
<?
	$image_file = "64.jpg";
	$image_size = getimagesize($image_file);
	print("图片的宽度：". $image_size[0]."<br>");
	print("图片的高度：". $image_size[1]."<br>");
	print("文件的格式为：". $image_size[2]."<br>");
?>
</BODY>
</HTML>