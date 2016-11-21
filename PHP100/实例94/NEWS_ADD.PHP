<?require "config.php";?>
<?
	if($password !=$adminpsd)
	{
		print "管理密码错!<br>";exit;
	}
	$title=ereg_replace("\r\n",'<br>',$title);
	$addline="<tr><td valign=top><img border=0 src=$dot_pic></td><td>$title</td></tr></td>"; 
	//查数据文件是否存在
	if(!file_exists($refreshbook))
	{
		$f = fopen("$refreshbook","w");
	 	fclose($f);
	}
	if(!file_exists($newsbook))
	{
		$f = fopen("$newsbook","w");
		fclose($f);
	}
	$f = fopen("$refreshbook","r");
	$line_has1 = fread($f,filesize("$refreshbook"));
	fclose($f);
	if($addline==$line_has1)
	{
		print "数据已经登录,请勿刷新!<br>";
		exit;
	}
	else
	{
		$f = fopen("$refreshbook","w");
		fwrite($f,"$addline");
		fclose($f);
	}
	//先读出原有数据
	$f = fopen("$newsbook","r");
	$line_has = fread($f,filesize("$newsbook"));
	fclose($f);
	//用覆盖方式(w)将原数据及新数据写回去
	$f = fopen("$newsbook","w");
	fwrite($f,"$addline\n");	#写进去,要加 \n
	fwrite($f,"$line_has");
	fclose($f);
	print "录入完成,谢谢!<br>";exit;
?>