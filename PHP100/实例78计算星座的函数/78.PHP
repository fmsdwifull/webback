<?
	/*
	* 计算星座的函数 string get_zodiac_sign(string month, string day) 
	* 输入：月份，日期
	* 输出：星座名称或者错误信息
	*/ 
?>
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
<title>计 算 星 座</title>
</HEAD>
<body alink="#FF0000" link="#000099" vlink="#CC6600" topmargin="8" leftmargin="0" bgColor="#FFFFFF">
<br><br><center>
<form action="<? echo $PHP_SELF; ?>" method="get">
<select size="1" name="month">
<?
	for($i=1;$i<13;$i++)
	{
?>
  <option value="<?echo $i?>"><?echo $i?></option>
<?
	}
?>
</select>月

<select size="1" name="day">
<?
	for($i=1;$i<32;$i++)
	{
?>
  <option value="<?echo $i?>"><?echo $i?></option>
<?
	}
?>
</select>日
<input type="submit" value="提交">
</form>
<?
	if($month)
	{
?>
<?echo $month?>月<?echo $day?>日的星座是：<font color=red>
<?
		// 调用例子：生日为$month月$day日的星座 
		echo get_zodiac_sign( $month,$day);
	}
?>
</font></center>
<?
function get_zodiac_sign($month, $day) 
{ 
	// 检查参数有效性 
	if ($month < 1 || $month > 12 || $day < 1 || $day > 31)
		return (false); 

	// 星座名称以及开始日期 
	$signs = array( 
		array( "20" => "宝瓶座"), 
		array( "19" => "双鱼座"), 
		array( "21" => "白羊座"), 
		array( "20" => "金牛座"), 
		array( "21" => "双子座"), 
		array( "22" => "巨蟹座"), 
		array( "23" => "狮子座"), 
		array( "23" => "处女座"), 
		array( "23" => "天秤座"), 
		array( "24" => "天蝎座"), 
		array( "22" => "射手座"), 
		array( "22" => "摩羯座") 
	); 

	list($sign_start, $sign_name) = each($signs[(int)$month-1]); 
	if ($day < $sign_start) 
	list($sign_start, $sign_name) = each($signs[($month -2 < 0) ? $month = 11: $month -= 2]); 
	return $sign_name; 

}//函数结束
?>