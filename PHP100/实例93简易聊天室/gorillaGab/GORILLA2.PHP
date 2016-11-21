<html>
<head>
<Title>
¡ƒÃÏ “
</title>
</head>
<META HTTP-EQUIV=Refresh CONTENT="5; URL=gorilla2.php">
<body  bgcolor="#EFEFEF">
<?
/*Dat file name. Make sure it is in the same folder*/
$talk_back_ok = "msg.txt";
/*Webmasters Name*/
/*Webmasters Password*/
/*messages displayed*/
$help_lenght = 15;
/*Home Long can the lake each message*/
$max_single_msg_lenght = 100000;
$max_file_size = $help_lenght * $max_single_msg_lenght;
?>
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

$lines = file($talk_back_ok);
$a = count($lines);

$u = $a - $help_lenght;

for($i = $a; $i >= $u ;$i--){
               
		echo $lines[$i];
	}


?><BR>
</body></html>
