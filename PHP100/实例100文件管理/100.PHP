<?
//设置路径（默认当前php文件所在路径）
$basedir = "d:/inetpub/wwwroot";
$textrows = "20";
$textcols = "85";
if(!$wdir) $wdir="/";
//HTML的标头
function html_header(){
	global $basedir;
	global $wdir;
	global $lastaction;
	echo "<HEAD>";
	echo "<TITLE>文件目录操作</TITLE>";
	echo "</HEAD>";
	echo "<BODY bgcolor=\"#fafad2\" link=\"#4C4C99\" vlink=\"#4C4C99\" alink=\"#4C4C99\">";
	echo "<table border=\"0\" align=\"center\" cellspacing=\"3\" cellpadding=\"3\" width=\"600\">";
	echo "<tr>";
	echo "<th colspan=\"2\" width=\"100%\" bgcolor=\"#00bfff\">";
	echo "&nbsp;<font size=\"6\" color=\"white\" face=\"arial, helvetica\">文件操作系统</font> &nbsp";
	echo "</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width\"50%\" align=\"left\"><A HREF=\"$PHP_SELF?action=root\"><font size=\"4\" face=\"arial, helvetica\">回根目录($basedir)</font></a></td>";
	echo "<td width\"50%\" align=\"right\"><A HREF=\"$PHP_SELF?wdir=$wdir\" title=\"Refresh current dir\"><font size=\"4\" face=\"arial, helvetica\">$wdir</font><img src=\"explore.gif\" border=\"0\"></a></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"2\"><hr></td>";
	echo "</tr>";
	echo "<tr>";
	echo " <td colspan=\"2\"><b><font size=\"3\" color=\"#4C4C99\" face=\"arial, helvetica\">$lastaction</font></b></td>";
	echo "<tr>";
	echo "<td colspan=\"2\"><hr><td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td colspan=\"2\">";
}
//计算文件大小
function display_size($file){
$file_size = filesize($file);
if($file_size >= 1073741824)
 	{
        $file_size = round($file_size / 1073741824 * 100) / 100 . "g";
	}
elseif($file_size >= 1048576)
	{
        $file_size = round($file_size / 1048576 * 100) / 100 . "m";
	}
elseif($file_size >= 1024)
	{
        $file_size = round($file_size / 1024 * 100) / 100 . "k";
	}
else{
        $file_size = $file_size . "b";
	}
return $file_size;
}
//文件列表函数 
function displaydir()
	{
	global $basedir;
	global $wdir;	
	//Table标题
	echo "<TABLE BORDER=\"0\" cellspacing=\"1\" cellpadding=\"1\" width=\"100%\">";
	echo "<tr>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">类型</font></th>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">名称</font></th>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">大小</font></th>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">修改时间</font></th>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">属性</font></th>";
	echo "<th bgcolor=\"#b0c4de\"><font color=\"white\" face=\"arial, helvetica\">操作</font></th>";
	echo "</tr>";
	//将子目录和文件存放在数组中
	//echo $basedir . $wdir;
	chdir($basedir . $wdir);
	$handle=opendir(".");
	while ($file = readdir($handle))
		{
		if(is_dir($file)) $dirlist[] = $file;
		if(is_file($file)) $filelist[] = $file;
		}
	closedir($handle);
	//首先存放子目录		
	if($dirlist)
		{
		//目录排序
		asort($dirlist);
		//遍厉数组
		while (list ($key, $file) = each ($dirlist))
			{
			//
			if (!($file == "."))
				{
				$filename=$basedir.$wdir.$file;
				$fileurl=rawurlencode($wdir.$file);
				$lastchanged = filectime($filename);
				$changeddate = date("d-m-Y H:i:s", $lastchanged);
				echo "<TR>";

				//建立回上一级目录的箭头
				if($file == "..")
					{
					$downdir = dirname("$wdir");
					echo "<TD align=\"center\" nobreak><A HREF=\"$PHP_SELF?action=chdr&file=$downdir\"><img src=\"parent.gif\" alt=\"Parent directory\" border=\"0\"></a></TD>\n";
					echo "<TD></TD>\n";
					echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font></TD>";
					echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . $changeddate . "</font></TD><TD align=\"right\">";
					printf("%o", (fileperms($filename)) & 0777);
					echo "</TD><TD nobreak>";
					echo "<A HREF=\"$PHP_SELF?action=chdr&file=$downdir\"><img src=\"parent.gif\" alt=\"Parent directory\" border=\"0\"></A> ";
					}
				 //列出目录
				 else
					{
					$lastchanged = filectime($filename);
					echo "<TD align=\"center\" nobreak><A HREF=\"$PHP_SELF?action=chdr&file=$fileurl\"><img src=\"folder.gif\" alt=\"$basedir$file\" border=\"0\"></a></TD>\n";
					echo "<TD nobreak><font size =\"-1\" face=\"arial, helvetica\">" . htmlspecialchars($file) . "</font></TD>\n";
					echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font></TD>";
					echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . $changeddate . "</font></TD><TD align=\"right\">";
					echo "<A HREF=\"$PHP_SELF?action=chmod&file=$filename\"><font size =\"-1\" face=\"arial, helvetica\">";
					printf("%o", (fileperms($filename)) & 0777);
					echo "</A>";
					echo "</font></TD><TD nobreak>";
					echo " <A HREF=\"$PHP_SELF?action=move&wdir=$wdir&file=$fileurl\"><img src=\"move.gif\" alt=\"Move,rename or copy $file\" border=\"0\"></A> ";
					echo " <A HREF=\"$PHP_SELF?action=touch&wdir=$wdir&touchfile=$fileurl\"><img src=\"touch.gif\" alt=\"Touch $file\" border=\"0\"></A> ";
					echo "<A HREF=\"$PHP_SELF?action=del&wdir=$wdir&file=$fileurl\"><img src=\"delete.gif\" alt=\"Delete $file\" border=\"0\"></A> ";
					}
				}
			}
		}
	//列出文件
	if($filelist)
		{
		//文件排序
		asort($filelist);
		while (list ($key, $file) = each ($filelist))
			{
			//检查文件格式并显示相应的图表和属性
			//图片文件
			if (ereg(".gif|.jpg",$file))
				{
				$icon = "<IMG SRC=\"image.gif\" alt=\"Image\" border=\"0\">";
				$browse = "1";
				$raw = "0";
				$image = "1";
				}
			//文本文件
			elseif (ereg(".txt",$file))
				{
				$icon = "<IMG SRC=\"text.gif\" alt=\"Text\" border=\"0\">";
				$browse = "1";
				$raw = "1";
				$image = "0";
				}
			//音频文件
			elseif (ereg(".wav|.mp2|.mp3|.mp4|.vqf|.midi",$file))
				{
				$icon = "<IMG SRC=\"audio.gif\" alt=\"Audio\" border=\"0\">";
				$browse = "1";
				$raw = "0";
				$image = "0";
				}
			//Web服务器文件
			elseif (ereg(".phps|.php|.php2|.php3|.php4|.asp|.asa|.cgi|.pl|.shtml",$file)) 
				{
				$icon = "<IMG SRC=\"webscript.gif\" alt=\"Web program\" border=\"0\">";
				$browse = "1";
				$raw = "1";
				$image = "0";
				}
			//Apache Web服务器安全设置
			elseif (ereg(".htaccess",$file))
				{
				$icon = "<IMG SRC=\"security.gif\" alt=\"Apache Webserver security settings\" border=\"0\">" ;
				$browse = "0";
				$raw = "1";
				$image = "0";
				}
			//Web页面文件
			elseif (ereg(".html|.htm",$file))
				{
				$icon = "<IMG SRC=\"webpage.gif\" alt=\"Web page\" border=\"0\">";
				$browse = "1";
				$raw = "1";
				$image = "0";
				}
			//不确定格式文件
			else
				{ 
				$icon = "<IMG SRC=\"text.gif\" alt=\"Unknown filetype\" border=\"0\">";
				$browse = "1";
				$raw = "1";
				$image = "0";
				}
			//文件列表
			$filename=$basedir.$wdir.$file;
			$fileurl=rawurlencode($wdir.$file);
			$lastchanged = filectime($filename);
			$changeddate = date("d-m-Y H:i:s", $lastchanged);
			echo "<TR>";
			echo "<TD align=\"center\" nobreak>";
			//产生文件图标以便预览
			if($raw == "1")
				{
				echo "<A HREF=\"$PHP_SELF?action=show&wdir=$wdir&file=$fileurl\">";
				}
			if($image == "1")
				{
				echo "<A HREF=\"$PHP_SELF?action=show&wdir=$wdir&file=$fileurl&image=$image\">";
				}
			echo "$icon</TD>\n";
			echo "<TD nobreak><font size =\"-1\" face=\"arial, helvetica\">" . htmlspecialchars($file) . "</font></TD>\n";
			echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . display_size($filename) . "</font></TD>";
			echo "<TD align=\"right\" nobreak><font size =\"-1\" face=\"arial, helvetica\">" . $changeddate . "</font></TD><TD align=\"right\">";
			echo "<A HREF=\"$PHP_SELF?action=chmod&wdir=$wdir&file=$fileurl\" title=\"Change permission level on $file\"><font size =\"-1\" face=\"arial, helvetica\">";
			printf("%o", (fileperms($filename)) & 0777);
			echo "</font></A>";
			echo "</TD><TD nobreak>";
			echo " <A HREF=\"$PHP_SELF?action=move&wdir=$wdir&file=$fileurl\"><img src=\"move.gif\" alt=\"Move,rename or copy $file\" border=\"0\"></A> ";
			echo " <A HREF=\"$PHP_SELF?action=touch&wdir=$wdir&touchfile=$fileurl\"><img src=\"touch.gif\" alt=\"Touch $file\" border=\"0\"></A> ";
			echo "<A HREF=\"$PHP_SELF?action=del&wdir=$wdir&file=$fileurl\"><img src=\"delete.gif\" alt=\"Delete $file\" border=\"0\"></A> ";
			//如果文件可以浏览，则给出浏览图标 
			if($browse == "1")
				{
				echo " <A HREF=\"$wdir$file\"><img src=\"browse.gif\" alt=\"Browse\" border=\"0\"></A> ";
				}
			//如果文件可以编辑，则给出编辑图标 
			if($raw =="1")
				{
				echo " <A HREF=\"$PHP_SELF?wdir=$wdir&action=edit&file=$fileurl\"><img src=\"edit.gif\" alt=\"Edit\" border=\"0\"></A> ";
				}
			}
		}
	echo "</TD></TR>\n";
	echo "</TABLE>";
	//显示出不同提交的Form表
	echo "<table border=\"0\" width=\"100%\">";
	echo "<TR><TD colspan=\"2\"><hr></td>";
	//文件上传
	echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">上传文件</font></td><td>";
	echo "<FORM ENCTYPE=\"multipart/form-data\" METHOD=\"POST\" ACTION=\"$PHP_SELF\">";
	echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
	echo "<INPUT NAME=\"userfile\" TYPE=\"file\" size=\"40\">";
	echo "<INPUT TYPE=\"SUBMIT\" NAME=\"upload\" VALUE=\"Go!\"></TD></TR>";
	echo "</FORM>";
	//创建新目录
	echo "<FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">";	
	echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">创建目录</font></td><td>";
	echo "<INPUT TYPE=\"TEXT\" NAME=\"mkdirfile\" size=\"40\">";
	echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"mkdir\">";
	echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
	echo "<INPUT TYPE=\"SUBMIT\" NAME=\"mkdir\"  VALUE=\"Go!\"></TD></TR>";
	echo "</FORM>";
	//产生新文件
	echo "<FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">";
	echo "<TR><TD><font size =\"-1\" face=\"arial, helvetica\">新建文件</font></td><td>";
	echo "<INPUT TYPE=\"TEXT\" NAME=\"file\" size=\"40\">";
	echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"createfile\"> ";
	echo "<input type=\"checkbox\" name=\"html\" value=\"yes\"><font size =\"-2\" face=\"arial, helvetica\">(html template)</font> ";
	echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
	echo "<INPUT TYPE=\"SUBMIT\" NAME=\"createfile\" VALUE=\"Go!\">";
	echo "</TD></TR>";
	echo "</TABLE>";
	echo "</FORM>";
}
//用户点击CANCEL，取消提交
if($cancel) $action="";
//上传文件处理
if($upload) 
	{
	copy($userfile,$basedir.$wdir.$userfile_name); 
		$lastaction = "上传文件到 $basedir$wdir";
		html_header();
		displaydir();
		echo $html_ender;
		exit;
	}
################################################################################
//开始处理actions
switch ($action)
{
//没有$action变量则显示初始页面
	case "":
		$lastaction = "$basedir";
		html_header();
		displaydir();
		echo $html_ender;
		break;
//回根目录
	case "root":
   		$wdir="/";
		$lastaction = "$basedir";
		html_header();
		displaydir();
		echo $html_ender;
		break;
//改变目录
	case "chdr":
		$wdir=$file."/";
		$lastaction = "$basedir$wdir";
		html_header();
		displaydir();
		echo $html_ender;
		break;
// 改动的对象
	case "touch":
		touch($basedir.$touchfile);
		$lastaction = "Touched $touchfile";
		html_header();
		displaydir();
		echo $html_ender;
		break;
//调试报表
	case "bugreport":
		if ($send)
			{
 			$lastaction = "Bug reported. Thank you!";
			html_header();
			mail("president@suneworld.com","Bug report","Name: $name \nVersion: $version \n\nProblem: $problem");
			echo "<h3><a href=\"$PHP_SELF?action=help&wdir=$wdir\">Back to help</a></h3>";
			}
		else
			{
			$lastaction = "Bug report form";
			html_header();
			?>
			<table>
			<form action="<? echo "$PHP_SELF?action=bugreport&wdir=$wdir&send=1"; ?>" method="POST">
			<tr>
				<td>Your name:</td>
				<td><input name="name" size="24" maxlength="30"></td>
			</tr><tr>
				<td>Your email adress:</td>
				<td><input name="email" size="24" maxlength="30"></td>
			</tr><tr>
				<td>Description of problem(s):</td>
				<td><textarea name="problem" cols="30" rows="5"></textarea></td>
			</tr><tr>
				<td colspan="2" align="center"><input type="submit" value="Send"></td>
			</tr>	
			</table>
			<?
			}
			echo $html_ender;
			break;
//删除文件或目录
	case "del":
		//用户确认删除
		if ($confirm)
			{
			
			//删除对象是目录
			if(is_dir($basedir.$file))
				{
				rmdir($basedir.$file);
				}
			//删除对象是文件
			else
				{
				exec("delete $basedir.$file");
				//unlink($basedir.$file);
				}
			$lastaction = "删除 $file";
			html_header();
			displaydir();
			}
		//显示删除提示
		else
			{
			$lastaction = "确实要删除<br>$file吗?";
			html_header();
			echo "<center><b><font size =\"5\" face=\"arial, helvetica\"><A HREF=\"$PHP_SELF?action=del&wdir=$wdir&file=$file&confirm=1\">YES!</A></font><br>";
			echo "<p><font size =\"5\" face=\"arial, helvetica\"><A HREF=\"$PHP_SELF?wdir=$wdir\">NO!</A></font><br><b></center>";
			}
		echo $html_ender;
		break;
//改变权限属性
	case "chmod":
		//用户确认
	      if ($confirm)
			{
			$level = "0";
			$level .= $owner;
			$level .= $group;
			$level .= $public;
			$showlevel = $level;
			$level=octdec($level);
			chmod($basedir.$file,$level);
			$lastaction = "改变属性 $file to $showlevel";
			html_header();
			displaydir();
			}
		//提示
		else
			{
			$lastaction = "改变属性$file";
			html_header();			
			echo "<font face=\"arial, helvetica\"><center><h4>Current level: ";
			printf("%o", (fileperms($basedir.$file)) & 0777);
			echo "</h4><FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">\n";
			function selections()
				{
				echo "<option value=\"0\">0 - No permissions";
				echo "<option value=\"1\">1 - Execute";
				echo "<option value=\"2\">2 - Write ";
				echo "<option value=\"3\">3 - Execute & Write";
				echo "<option value=\"4\">4 - Read";
				echo "<option value=\"5\">5 - Execute & Read";
				echo "<option value=\"6\">6 - Write & Read";
				echo "<option value=\"7\">7 - Write, Execute & Read";
				echo "</select>";
				}
			echo "<p><h4>Owner<br>";
			echo "<select name=\"owner\">";
			selections();
			echo "<p>Group<br>";
			echo "<select name=\"group\">";
			selections();
			echo "<p>Public<br>";
			echo "<select name=\"public\">";
			selections();
			echo "</h4>";
			echo "<p>";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Change\">\n";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"chmod\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">";
			echo "</FORM>";
			echo "</center>";
			}
		echo $html_ender;
		break;
//移动文件
	case "move":
		//用户确认对象重命名、移动或复制
		if($confirm && $newfile)
 			{
			//对象存在
    			if(file_exists($basedir.$newfile))
				{
				$lastaction = "Destination file already exists. Aborted.";
				}
			else
				{
				if($do == copy)
					{
					copy($basedir.$file,$basedir.$newfile);
					$lastaction = "Copied\n$file to $newfile";
					}
				else
					{
					rename($basedir.$file,$basedir.$newfile);
					$lastaction = "Moved/renamed\n$file to $newfile";
					}
				}
			html_header();
			displaydir();
    			echo $html_ender;
			}
		//提示
		else
			{
			$lastaction = "Moving/renaming or copying<br>$file";
			html_header();
			echo "<FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">\n";
			echo "<select name=\"do\">";
			echo "<option value=\"copy\">Copy";
			echo "<option value=\"move\">Move/rename";
			echo "</select> ";
			echo "($file)";
			echo "<h4>To</h4>";
			echo "<INPUT TYPE=\"TEXT\" NAME=\"newfile\" value=\"$file\" size=\"40\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";			
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"move\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
			echo "<p>";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Do\">\n";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\">\n";
			echo "</FORM>";
			echo $html_ender;
			}
		break;
//编辑文件
	case "edit":

		//用户编辑完毕，返回主页面
		if($confirm && $file)
   			{
    			$lastaction = "Edited $file";
			html_header();
			$fp=fopen($basedir.$file,"w");
    			fputs($fp,stripslashes($code));
    			fclose($fp);
			displaydir();
			}
		//在textarea显示文件内容
		else
			{
			$lastaction = "Editing $file";
			html_header();
			echo "<FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"edit\">\n";
			echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";
			$fp=fopen($basedir.$file,"r");
			$contents=fread($fp,filesize($basedir.$file));
			echo "<TEXTAREA NAME=\"code\" rows=\"$textrows\" cols=\"$textcols\">\n";
			echo htmlspecialchars($contents);
			echo "</TEXTAREA><BR>\n";
			echo "<center><INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Save\">\n";
			echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\"></center><BR>\n";
			echo "</FORM>";			
			}
		echo $html_ender;
		break;
//显示文件
	case "show":

		//以文本格式显示文件
		$filelocation = $wdir.$file;	
		$lastaction = "$basedir$file";
		html_header();
		//如果是图片则显示
		if($image == "1")
			{
			echo "<center><img src=\"$file\"></center>";
			}
		//如果是文本，显示.
		else
			{
			show_source($basedir.$file);
			}
		echo $html_ender;
		break;
//创建新目录
	case "mkdir":

		//如果该目录已经存在. 
		if(file_exists($basedir.$wdir.$mkdirfile))
			{
			$lastaction = "$basedir$wdir$mkdirfile allready exists.";
			html_header();
			}
		//否则则创建
		else
			{
			$lastaction = "Created the directory $wdir$mkdirfile";
			html_header();
			mkdir($basedir.$wdir.$mkdirfile,0750);
			}
		displaydir();
		echo $html_ender;
		break;
//生成新文件
	case "createfile":
		$filelocation = $wdir.$file;
		//编辑完毕，返回.
		if($done == "1")
   			{
			$lastaction = "Created $file";
			html_header();
			$fp=fopen($basedir.$filelocation,"w");
			fputs($fp,stripslashes($code));
			fclose($fp);
			displaydir();
			}
		else
			{
   			//如果文件已经存在
   			if(file_exists($basedir.$filelocation))
   				{
   				$lastaction = "$file already exists.";
				html_header();
				displaydir();
				}
			else
				{
				$lastaction = "Creating $file";
				html_header();
				echo "<FORM METHOD=\"POST\" ACTION=\"$PHP_SELF\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"file\" VALUE=\"$file\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"action\" VALUE=\"createfile\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"wdir\" VALUE=\"$wdir\">\n";
				echo "<INPUT TYPE=\"HIDDEN\" NAME=\"done\" VALUE=\"1\">\n";				
				echo "<TEXTAREA NAME=\"code\" rows=\"$textrows\" cols=\"$textcols\">\n";
				//用户选用Web页面
				if(isset($html))
					{
					echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n\n";
					echo "<html>\n";
					echo "<head>\n\n";
					echo "	<title>Untitled</title>\n";
					echo "</head>\n";
					echo "<body>\n\n\n\n";
					echo "</body>\n";
					echo "</html>";
					}
				echo "</TEXTAREA><BR>\n";
				echo "<center><INPUT TYPE=\"SUBMIT\" NAME=\"confirm\" VALUE=\"Create\">\n";
				echo "<INPUT TYPE=\"SUBMIT\" NAME=\"cancel\" VALUE=\"Cancel\"></center><BR>\n";
				echo "</FORM>";			
				}
			}
		echo $html_ender;
		break;
}
?>