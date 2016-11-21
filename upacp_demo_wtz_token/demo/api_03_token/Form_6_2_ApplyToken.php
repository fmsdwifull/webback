<?php
header ('Content-type:text/html;charset=utf-8' );
include_once $_SERVER ['DOCUMENT_ROOT'] . '/upacp_demo_wtz_token/sdk/acp_service.php';
	
/**
 * 重要：联调测试时请仔细阅读注释！
 * 
 * 产品：无跳转token产品<br>
 * 交易：申请token号：后台交易<br>
 * 日期： 2015-09<br>
 * 版本： 1.0.0
 * 版权： 中国银联<br>
 * 说明：以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己需要，按照技术文档编写。该代码仅供参考，不提供编码性能规范性等方面的保障<br>
 * 交易说明:根据开通并付款交易的orderId申请,后台同步应答确定交易成功。
 */
 

$params = array(

		//以下信息非特殊情况不需要改动
		'version' => '5.0.0',		           //版本号
		'encoding' => 'utf-8',		           //编码方式
		'signMethod' => '01',		           //签名方法
		'txnType' => '79',		               //交易类型
		'txnSubType' => '05',		           //交易子类
		'bizType' => '000902',		           //业务类型
		'accessType' => '0',		           //接入类型
		'channelType' => '07',		           //渠道类型
		'encryptCertId' => com\unionpay\acp\sdk\AcpService::getEncryptCertId(), //验签证书序列号
		
		//TODO 以下信息需要填写
		'merId' => $_POST["merId"],		//商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
		'orderId' => $_POST["orderId"],	//商户订单号，填写开通并支付交易的orderId，此处默认取demo演示页面传递的参数
		'txnTime' => $_POST["txnTime"],	//订单发送时间，填写开通并支付交易的txnTime，此处默认取demo演示页面传递的参数
// 		'reqReserved' =>'透传信息',            //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据
		'tokenPayData' => "{trId=62000000001&tokenType=01}",     //测试环境固定trId=62000000001&tokenType=01，生产环境由业务分配
		
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
    //申请token成功
    //TODO
    echo "申请token成功。<br>\n";
    $tokenPayData = $result_arr["tokenPayData"];
    $tokenPayData = com\unionpay\acp\sdk\convertStringToArray(substr($tokenPayData, 1, strlen($tokenPayData)-2));
    if(array_key_exists("token", $tokenPayData)){
    	$token = $tokenPayData["token"];//tokenPayData其他子域均可参考此方式获取
    }
    foreach ($tokenPayData as $key => $value){
    	echo $key . "=" . $value . "<br>\n";
    }
} else {
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
