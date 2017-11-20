<?php
    $xmlstring ="
	 <xml><appid><![CDATA[wxd85042e7891d846c]]></appid>
       <attach><![CDATA[test]]></attach>
       <bank_type><![CDATA[CFT]]></bank_type>
       <cash_fee><![CDATA[1]]></cash_fee>
	   <fee_type><![CDATA[CNY]]></fee_type>
	   <is_subscribe><![CDATA[N]]></is_subscribe>
	   <mch_id><![CDATA[1491622822]]></mch_id>
	   <nonce_str><![CDATA[2x3p67fqjuj0vs5e1k5jt8qlel0blq9r]]></nonce_str>
	   <openid><![CDATA[ocQC-03hUTa6atFI0jJYZuugmRbc]]></openid>
	   <out_trade_no><![CDATA[149162282220171117165625]]></out_trade_no>
	   <result_code><![CDATA[SUCCESS]]></result_code>
	   <return_code><![CDATA[SUCCESS]]></return_code>
	   <sign><![CDATA[A16483F33848ED56133D93A8BE0E4B65]]></sign>
	   <time_end><![CDATA[20171117165725]]></time_end>
	   <total_fee>1</total_fee>
	   <trade_type><![CDATA[APP]]></trade_type>
	   <transaction_id><![CDATA[4200000014201711175255922788]]></transaction_id>
	 </xml>
	";
	
	  $obj = simplexml_load_string($xmlstring, 'SimpleXMLElement', LIBXML_NOCDATA);
    $data = json_decode(json_encode($obj), true);
	
	//$xml = simplexml_load_string($xmlstring);
	//$json = json_encode($xml);
	//$array = json_decode($json,TRUE);
	var_dump($data);
?>