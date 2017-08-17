<?php
	//ini_set('max_execution_time','0');
	set_time_limit(0);
	ignore_user_abort(true); 
	$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
	$i = 0;
	echo "-------------------";
	while(1)
	{	
		$i++;
		echo $i;
		$xxx=$_GET['xxx'];
		$txt = $i.$xxx."\n";
		fwrite($myfile, $txt);
		sleep(1);
		if($i>100)
		{
			break;
		}
	}
	fclose($myfile);
?>
