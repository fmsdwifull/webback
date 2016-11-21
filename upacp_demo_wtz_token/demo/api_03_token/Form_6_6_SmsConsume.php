<?php
header ( 'Content-type:text/html;charset=utf-8' );
include_once $_SERVER ['DOCUMENT_ROOT'] . '/upacp_demo_wtz_token/sdk/acp_service.php';

/**
 * 重要：联调测试时请仔细阅读注释！
 * 
 * 产品：无跳转token产品<br>
 * 交易：消费短信：后台交易，无通知<br>
 * 日期： 2015-09<br>
 * 版本： 1.0.0
 * 版权： 中国银联<br>
 * 说明：以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己需要，按照技术文档编写。该代码仅供参考，不提供编码性能规范性等方面的保障<br>
 * 交易说明: 同步应答确定交易成功。
 *        金额  + token号  + 手机号phoneNo（customerInfo域），同步应答确定交易成功。
 */
 
 --with-openssl

$params = array(

		//以下信息非特殊情况不需要改动
		'version' => '5.0.0',		           //版本号
		'encoding' => 'utf-8',		         //编码方式
		'signMethod' => '01',		           //签名方法
		'txnType' => '77',		             //交易类型
		'txnSubType' => '02',		           //交易子类
		'bizType' => '000902',		         //业务类型
		'accessType' => '0',		           //接入类型
		'channelType' => '07',		           //渠道类型
        'currencyCode' => '156',          //交易币种，境内商户勿改
		'encryptCertId' => com\unionpay\acp\sdk\AcpService::getEncryptCertId(), //验签证书序列号
		
		//TODO 以下信息需要填写
		'merId' => $_POST["merId"],		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
		'orderId' => $_POST["orderId"],	//商户订单号，填写开通并支付交易的orderId，此处默认取demo演示页面传递的参数
		'txnTime' => $_POST["txnTime"],	//订单发送时间，填写开通并支付交易的orderId，此处默认取demo演示页面传递的参数
		'txnAmt' => $_POST["txnAmt"],	//交易金额，单位分，如上送短信验证码，请填写获取验证码时一样的txnAmt，此处默认取demo演示页面传递的参数
		// 		'reqReserved' =>'透传信息',            //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据
		'tokenPayData' => "{trId=62000000001&token=" . $_POST["token"]. "}",     //token号从开通和开通查询借口获取，trId和开通接口时上送的相同
		
);
com\unionpay\acp\sdk\AcpService::sign ( $params ); // 签名
$url = com\unionpay\acp\sdk\SDK_BACK_TRANS_URL;

$result_arr = com\unionpay\acp\sdk\AcpService::post ( $params, $url );
if(count($result_arr)<=0) { //没收到200应答的情况
	printResult ( $url, $params, "" );
	return;
}

printResult ($url, $params, $result_arr ); //页面打印请求应答数据

if (!com\unionpay\acp\sdk\AcpService::validate ($result_arr) ){
	echo "应答报文验签失败<br>\n";
	return;
}


echo "应答报文验签成功<br>\n";
if ($result_arr["respCode"] == "00"){
	//TODO
	echo "交易成功。<br>\n";
}else {
	//其他应答码做以失败处理
	//TODO
	echo "失败：" . $result_arr["respMsg"] . "。<br>\n";
}

/**
 * 打印请求应答
 *
 * @param
 *        	$url
 * @param
 *        	$req
 * @param
 *        	$resp
 */
function printResult($url, $req, $resp) {
	echo "=============<br>\n";
	echo "地址：" . $url . "<br>\n";
	echo "请求：" . str_replace ( "\n", "\n<br>", htmlentities ( com\unionpay\acp\sdk\createLinkString ( $req, false, true ) ) ) . "<br>\n";
	echo "应答：" . str_replace ( "\n", "\n<br>", htmlentities ( com\unionpay\acp\sdk\createLinkString ( $resp , false, true )) ) . "<br>\n";
	echo "=============<br>\n";
}
