<HTML>
<HEAD>
<META NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
<title>检测OICQ用户是否在线</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="20" bgColor="#FFFFFF">

<? 
	if($HTTP_REFERER=="") 
	{ 
		echo "非法调用<br>正确用法:&lt;script src=\"http://yourhost/oicq.php?uin=你的OICQ号\"&gt;&lt;/script&gt;"; 
		exit(); 
	}

	function get_status($uin) 
	{ 
		$fp = @fsockopen ("infocenter.tencent.com", 80, &$errno, &$errstr, 30); 
		if(!$fp) 
		{ 
			return '出错'; 
		} 
		else 
		{ 
			fputs($fp, "GET /$uin/l/00/0/ HTTP/1.0\n\n"); 
			$do = 'yes'; 
			while(!feof($fp)) 
			{ 
				$line = fgets ($fp,128); 
				$do = ($do == 'yes')?'yes':(eregi("^GIF89", $line))?'yes':'no'; 
				if($do == 'yes') 
				{ 
					if(ereg("Online", $line)) 
					{ 
						return '在线'; 
					} 
					elseif(ereg("Offline", $line)) 
					{ 
						return '没在线'; 
					} 
				} 
			}
			fclose($fp); 
		}
		return '未知'; 
	} 
	if(isset($uin)) 
	{ 
		switch(get_status($uin)) 
		{ 
			case "在线": 
				$oicqimg="on.GIF"; 
				$mstatus="在线"; 
				break; 
			case "没在线": 
				$oicqimg="off.GIF"; 
				$mstatus="没在线"; 
				break; 
			case "未知": 
				$oicqimg="na.GIF"; 
				$mstatus="未知"; 
				break; 
		} 
	}
?> 

document.write("<img src=\"<?echo $oicqimg?>\"><sup><?echo $mstatus?><sup>"); 