<?php  
	//error_reporting(E_ERROR); 
	$private_key = '-----BEGIN RSA PRIVATE KEY-----
		MIICWwIBAAKBgQDH+BUMOYh9kHExaQjmuH4i9G8Osk/0RxOJ3Oc06fe2EVEeimTO
		GGqm25TigFYrVbFvd5TWC4UfIgErBob/Wlsa+zXMbZDqOFBWtrqCmQ0426IC/w7+
		Hetz73RLW9m9At8AAGNqaoulorPnT/f4NYoNIzADQ4YnQe6GtWJvnI9mewIDAQAB
		AoGARkwpIg4LtJCVqlgRYAKVnTYu4IzA3NArxzhYM1rY0TGPQdxHCci9nYDt+x5A
		rKVIZjY0pXaRStuKa5S02onqIpeRVD4oe6nC2vRThew9poiI9iw1ZP+jFkkADFYl
		+blVLgv63BRgrlRfkKT/YJnV/L+iIu2CFW+8ReFITeCMo5kCQQDzeXHRDlW5zPY2
		KnQrDzBQJ8nVZ1PEmfHsuHbGk1KeXbiG2pQngh1bM5k4GHrEYAIpJ7QQGBQEAz9s
		Ik1/BXQ3AkEA0kGsRrLDDI7bv/5WDr+cZ51lDTbNe8CUiGFYTxGMTT/fRLjfKNxp
		UmFv1Tm1oYmeSYxdS1plq3AqkU6h0pMF3QJAIhT//7m3+lhcptxugpCPvMi1EjBy
		o3TBTtfLmKSKzixkZkw2rQkjvt6MNjQHC3I9GzG5nP8h3iXuPN7YZk2HJQJAJbF6
		Vg5UI1s1EB1jhi9ZtcWkyRKrEeV7e1ugPkSSF4M83pAaCbRB+W/YYax/4F7QjrTo
		QMsK8Qohx30GS77pzQJADpgWamf69LuHoo/GVAbQrIL0G1ln22FsfH010lqD76dr
		p545pnNTxdqRUB4g8IbQf1pwmbTfWTttm0qgOn98EQ==
		-----END RSA PRIVATE KEY-----';  
	  
	$public_key = '-----BEGIN PUBLIC KEY-----
		MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDH+BUMOYh9kHExaQjmuH4i9G8O
		sk/0RxOJ3Oc06fe2EVEeimTOGGqm25TigFYrVbFvd5TWC4UfIgErBob/Wlsa+zXM
		bZDqOFBWtrqCmQ0426IC/w7+Hetz73RLW9m9At8AAGNqaoulorPnT/f4NYoNIzAD
		Q4YnQe6GtWJvnI9mewIDAQAB
		-----END PUBLIC KEY-----
		';  
		
	//
			  
	//echo $private_key;  
	$pi_key =  openssl_pkey_get_private(file_get_contents('rsa_private_key.pem'));//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id  
	$pu_key = openssl_pkey_get_public(file_get_contents('rsa_public_key.pem'));//这个函数可用来判断公钥是否是可用的  
	

	
	var_dump($pi_key);
	var_dump($pu_key); 
	  
	//die;  
	$data = "aassssasssddd";//原始数据  
	$encrypted = "";   
	$decrypted = "";   
	  
	echo "source data:",$data,"\n";  
	  
	echo "private key encrypt:\n";  
	  
	openssl_private_encrypt($data,$encrypted,$pi_key);//私钥加密  
	$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的  
	echo $encrypted,"\n";  
	  
	echo "public key decrypt:\n";  
	  
	openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//私钥加密的内容通过公钥可用解密出来  
	echo $decrypted,"\n";  
	  
	echo "---------------------------------------\n";  
	echo "public key encrypt:\n";  
	  
	openssl_public_encrypt($data,$encrypted,$pu_key);//公钥加密  
	$encrypted = base64_encode($encrypted);  
	echo $encrypted,"\n";  
	  
	echo "private key decrypt:\n";  
	openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);//私钥解密  
	echo $decrypted,"\n";  
?>