<?php
	echo mysql_real_escape_string("helloworld");
	//use mysqli
	//or PDO instead in
	echo mysqli::escape_string("hello 'world");
?>