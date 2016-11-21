<HTML>
<HEAD>
<META NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
<title>检测操作系统和浏览器类型</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="20" bgColor="#FFFFFF">
<?
/* 
浏览器类型、版本
*/ 

	if(ereg( 'MSIE ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version))
	{
		$browser_Ver=$log_version[1]; 
		$browserType='IE'; 
	}
	elseif(ereg( 'Opera ([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version))
	{
		$browser_Ver=$log_version[1]; 
		$browserType='OPERA'; 
	}
	elseif(ereg( 'Mozilla/([0-9].[0-9]{1,2})',$HTTP_USER_AGENT,$log_version))
	{
		$browser_Ver=$log_version[1]; 
		$browserType='MOZILLA'; 
	}
	else
	{
		$browser_Ver=0; 
		$browserType='OTHER'; 
	} 
	echo "<br><br>浏览器类型：<font color=red>$browserType $browser_Ver</font>";
/* 
操作系统类型
*/ 
	if(strpos($HTTP_USER_AGENT,'Windows 9'))
	{
		$osType="Windows 9X";
	}
	elseif(strpos($HTTP_USER_AGENT,'Windows NT'))
	{
		$osType="Windows NT";
	}
	elseif(strpos($HTTP_USER_AGENT,'Windows 2000'))
	{
		$osType="Windows 2000";
	}
	elseif(strpos($HTTP_USER_AGENT,'Mac'))
	{
		$osType="Mac";
	}
	elseif(strpos($HTTP_USER_AGENT,'Unix'))
	{
		$osType="Unix";
	}
	elseif(strpos($HTTP_USER_AGENT,'Linux'))
	{
		$osType="Linux";
	}else $osType="Others";

	echo "<br><br>操作系统类型：<font color=red>$osType</font>";
	echo "<br><br>IP地址：<font color=red>$REMOTE_ADDR</font>";
?>
</bady>
</html>