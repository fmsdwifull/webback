<?php 
 
/** 
 * PHP DES 加密程式 
 * 
 * @param $key 密鑰（八個字元內） 
 * @param $encrypt 要加密的明文 
 * @return string 密文 
 */  
 
 /* 
function encrypt ($key, $encrypt)  
{  
    // 根據 PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) 修正 Message 加入 Padding  
    $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);  
    $pad = $block - (strlen($encrypt) % $block);  
    $encrypt .= str_repeat(chr($pad), $pad);  
   
    // 不需要設定 IV 進行加密  
    $passcrypt = mcrypt_encrypt(MCRYPT_DES, $key, $encrypt, MCRYPT_MODE_ECB);  
    return base64_encode($passcrypt);  
}  
   

function decrypt ($key, $decrypt)  
{  
    // 不需要設定 IV  
    $str = mcrypt_decrypt(MCRYPT_DES, $key, base64_decode($decrypt), MCRYPT_MODE_ECB);  
   
    // 根據 PKCS#7 RFC 5652 Cryptographic Message Syntax (CMS) 修正 Message 移除 Padding  
    $pad = ord($str[strlen($str) - 1]);  
    return substr($str, 0, strlen($str) - $pad);  
}  
   
$key = 'skey';  
$plain = '0123ABCD!@#$中文';  
$encrypt = encrypt($key, $plain);  
//$decrypt = decrypt($key, $encrypt);  
   
//echo 'plain = ' . $plain . "\n";  
//echo 'encrypt = ' . $encrypt . "\n";  
//echo 'decrypt = ' . $decrypt . "\n";  
?>  

*/

class Security {  
    public static function encrypt($input, $key) {  
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);  
        $input = Security::pkcs5_pad($input, $size);  
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');  
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);  
        mcrypt_generic_init($td, $key, $iv);  
        $data = mcrypt_generic($td, $input);  
        mcrypt_generic_deinit($td);  
        mcrypt_module_close($td);  
        $data = base64_encode($data);  
        return $data;  
    }  
   
    private static function pkcs5_pad ($text, $blocksize) {  
        $pad = $blocksize - (strlen($text) % $blocksize);  
        return $text . str_repeat(chr($pad), $pad);  
    }  
   
    public static function decrypt($sStr, $sKey) {  
        $decrypted= mcrypt_decrypt(  
        MCRYPT_RIJNDAEL_128,  
        $sKey,  
        base64_decode($sStr),  
        MCRYPT_MODE_ECB  
    );  
   
        $dec_s = strlen($decrypted);  
        $padding = ord($decrypted[$dec_s-1]);  
        $decrypted = substr($decrypted, 0, -$padding);  
        return $decrypted;  
    }     
}  
   
   
   
$key = "1234567812345678";  
//$data = "123456";  
   
   
$value = "mdSm0RmB+xAKrTah3DG31A==";   
   
$value = Security::encrypt($data , $key );  
echo $value.'<br/>';  
echo Security::decrypt($value, $key ); 

?>


登陆接口调整：
IP地址：
http://116.236.115.125:9000
post参数（变化部分）：
shopcode
usercode
password
checkstr（接口认证，认证规则 md5 Ymd+"eroadcar"）

