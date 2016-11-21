<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>PHP4.0 +MYSQL 留言本</title>
<style type="text/css">
<!--
input { font-size:9pt; }
A:link {text-decoration: underline; font-size:9pt;color:000059}
A:visited {text-decoration: underline; font-size:9pt;color:000059}
A:active {text-decoration: underline; font-size:9pt}
A:hover {text-decoration:underline;color:red}
body,table {font-size: 9pt}
tr,td{font-size:9pt}
-->
</style>
</head>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<center><font color=red size=6>PHP4.0+MYSQL 留言本</font></center><br>
<?
	$dbuser=mysql_connect('localhost','root','');
	$mydb=mysql_select_db('test',$dbuser);
	$mytable="guestbook";	// 表名
	$page_size=8;
	$notify=1;
	$imgdir="images";

	$images=array( "say.gif" => "随便说说",
				"happy.gif" => "高兴",
				"sad.gif" => "悲伤",
				"toohappy.gif" => "大笑",
				"wilk.gif" => "眨眼",
				"warning.gif" => "警告",
				"question.gif" => "问题",
				"reply.gif" => "回答",
				"attention.gif" => "注意",
				"agree.gif" => "同意",
				"other.gif" => "号外" );
?>
