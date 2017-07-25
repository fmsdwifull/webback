<?php
            $url="127.0.0.1/test/wrfile.php?xxx=kkkk";        
            $httph = curl_init($url);
            curl_setopt($httph, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($httph, CURLOPT_BINARYTRANSFER, true);
			            curl_setopt($httph, CURLOPT_TIMEOUT, 1);

            $output = curl_exec($httph);
			var_dump($output);
/* 	$cl = curl_init(); 
	$curl_opt = array(CURLOPT_URL, '127.0.0.1/test/wrfile.php?xxx=kkkk', 
	CURLOPT_RETURNTRANSFER, 1, 
	CURLOPT_TIMEOUT, 1,); 
	curl_setopt_array($cl, $curl_opt); 
	curl_exec($ch); 
	curl_close($ch);  */
?> 
