<? require "config.php"; ?>
<HTML>
<HEAD>
<META NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
<style type="text/css">
<!--
input { font-size:9pt;}
A:link {text-decoration: underline; font-size:9pt;color:000059}
A:visited {text-decoration: underline; font-size:9pt;color:000059}
A:active {text-decoration: none; font-size:9pt}
A:hover {text-decoration:underline;color:red}
body,table {font-size: 9pt}
tr,td{font-size:9pt}
-->
</style>
<title>简单的新闻公告栏</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br>
<?
	$line_array=file($newsbook);
	$linenum=count($line_array);
	if($table!=1)
	{
?>
<table width=70% bgcolor="FFFBEC" align="center">
  <tr>
    <td width=5%></td><td width=95%></td>
  </tr>
<?
	}
	$i=0;
	while($i<$linenum && $i<$line_max)
	{
		$line="$line_array[$i]\n";
		print "$line";
		$i++;
	}
	if($table!=1)
	{
?>
</table>
<?
	}
?>
</body>
</html>