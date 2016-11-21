<html>
<head>
<Title>¼òÒ×ÁÄÌìÊÒ</title>
</head>
<body TOPMARGIN=0 LEFTMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
<tr align="left" bgcolor="#666666">
<td height="20">
<?
/*If you have ICQ List you vin here.*/
$uin = "20559508";
/*Dat file name. Make sure it is in the same folder*/
$talk_back_ok = "msg.txt";
/*Webmasters Image Location(put url not path)*/
$webmaster_image = "kmoo.gif";
/*Webmasters Name*/
$webmaster_name = "root";
/*Webmasters Password*/
$pass = "";
/*messages displayed*/
$help_lenght = 20;
/*Home Long can the lake each message*/
$max_single_msg_lenght = 100000;
$max_file_size = $help_lenght * $max_single_msg_lenght;
?></b></i>
</td></tr>
<tr bgcolor="#FFCC66">
<td><img src="pix.gif" width="1" height="4" alt=""></td>
</tr></TABLE>
<TABLE width="100%" border=0 cellspacing=0 cellpadding=0 bgcolor="#EFEFEF">
<tr bgcolor="#666666"><td align="left">
<TABLE width="100%" height="500" border=0 cellspacing=0 cellpadding=0 bgcolor="#EFEFEF">
<tr align="left"><td valign="top"><font size="-1" color="#666666">
<?
$person = str_replace ("\n"," ", $person);
$person = str_replace ("<", " ", $person);
$person = str_replace (">", " ", $person);
$person = stripslashes ($person);
?>
<table width="100%" border="0">
<TR><form action="gorilla.php" method="post"><TD align="left">
<FONT SIZE="-1">Äİ³Æ£º</FONT><input type="text" name="person" size="12" maxlength="80" value="<? echo $person; ?>">
<FONT SIZE="-1"></FONT>       <input type="text" name="message" size=60>
<input type="submit" value="·¢ÑÔ">
</TD></form></TR>
<?
/* check if file size is over maximum*/
$file_size= filesize($talk_back);
if ($file_size > $max_file_size) {
$lines = file($talk_back_ok);
$a = count($lines);
$u = $a - $help_lenght;
for($i = $a; $i >= $u ;$i--){
		$msg_old =  $lines[$i] . $msg_old;
	}
$deleted = unlink($talk_back_ok);
$fp = fopen($talk_back_ok, "a+");
$fw = fwrite($fp, $msg_old);
fclose($fp);
}
$msg = str_replace ("\n"," ", $message);
$msg = str_replace ("\n"," ", $message);
$msg = str_replace ("<", " ", $msg);
$msg = str_replace (">", " ", $msg);
$msg = stripslashes ($msg);
if($person == $pass)
   {
   $sign = ("<img src= '$webmaster_image'>&nbsp;$webmaster_name");
   }
   else
   {
   $sign = ($person);
   }
if ($msg != "" && $person != ""){
$time = gmDate("h:i");
$fp = fopen($talk_back_ok, "a+");
$fw = fwrite($fp, "\n<tr><td><FONT SIZE=\"+1\"><b> $sign :</b></FONT><FONT SIZE=\"-2\" color=\"red\"><I>$time</I></FONT>&nbsp;:<FONT SIZE=\"-1\"> $msg<br></FONT></td></tr>");
fclose($fp);
}
?>
</table>
</CENTER>
</font></td></tr></TABLE></td></tr></TABLE>
</body></html>