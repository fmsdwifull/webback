<?php
	ini_set('max_execution_time','0');
	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$i = 0;
	echo "-------------------";
	while(1)
	{	
		$i++;
		echo $i;
		$xx=$_GET['xxx'];
		$txt = $i.$xxx"\n";
		fwrite($myfile, $txt);
		sleep(1);
		if($i>100)
		{
			break;
		}
	}
	fclose($myfile);
?>