<?
	print("<HTML>\n");
	print("<HEAD>\n");
	print("<TITLE>转换所有的标记为PHP</TITLE>\n");
	print("</HEAD>\n");

	$Hour = date("H");
	$Intensity = round(($Hour/24.0)*(0xFF));
	$PageColor = dechex($Intensity) . dechex($Intensity) . 	dechex($Intensity);

	print("<BODY BGCOLOR=\"#$PageColor\">\n");

	print("<H1>转换所有的标记为PHP</H1>\n");

	print("</BODY>\n");

	print("</HTML>\n");
?>