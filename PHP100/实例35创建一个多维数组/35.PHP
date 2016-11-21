<HTML>
<HEAD>
<TITLE>创建一个多维数组</TITLE>
</HEAD>
<?
	$Cities = array(				//二维数组array（）
		"华北地区"=>array(
			"北京市",
			"天津市",
			"石家庄"
			),
		"西北地区"=>array(
			"西安",
			"拉萨"
			)
		);
	print("华北地区: ".$Cities["华北地区"][0]);	//打印$Cities["华北地区"][0]
?>
</BODY>
</HTML>