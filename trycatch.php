<?php 
/* 	try {
		if (file_exists('test_try_catch.php')) {
			require ('test_try_catch.php');
		}else{
			throw new Exception('file is not exists');
		}
	} catch (Exception $e) {
		echo $e->getMessage();
	} */
	try{
		if (file_exists('test_try_catch.php')) {
			require ('test_try_catch.php');
		}
	}catch (Exception $e){
		echo $e->getMessage();
	}
	
?>