<?php

use Buke\Util\Crypto\AESTool;
use Buke\Util\Crypto\AESUtil;

require dirname(__DIR__) . '/vendor/autoload.php';

print PHP_EOL . "======== PHP 7+ 创建密钥及 IV 进行加密案例 ========" . PHP_EOL;
$key = AESTool::generateKey(16);
$iv = AESTool::generateIV();
$pText = "PHP 7+ 创建密钥及 IV 进行加密案例";

print "key: " . bin2hex($key) . PHP_EOL;
print "iv: " . bin2hex($iv) . PHP_EOL;
print "pText: " . $pText . PHP_EOL;

$aes = new AESUtil("aes-128-cbc", $key);

$cText = bin2hex($aes->encryptWithIV($pText, $iv));
print "加密后: " . $cText . PHP_EOL;

$deText = $aes->decryptWithIV(hex2bin($cText), $iv);
print "解密后: " . $deText . PHP_EOL;

print PHP_EOL . "======== 测试跟 Java 加密后数据是否一致 ========" . PHP_EOL;
print "======== 期望加密后数据是：e8aa678c21aa028988cd74ee2835344519014a4e9365cb8dda7cf24bfe95dfdf0e047cf979587b02500ccad15415b1c3 ========" . PHP_EOL;
// 测试跟 Java 加密是否一致
$key = hex2bin('e43ee68382dc550fbd1d329486febdd4');
$iv = hex2bin('ddffc44a93503156abb36e9bbca876f8');
$pText = "AES 算法基于 Java 实战演示";

print "key: " . bin2hex($key) . PHP_EOL;
print "iv: " . bin2hex($iv) . PHP_EOL;
print "pText: " . $pText . PHP_EOL;

$aes = new AESUtil("aes-128-cbc", $key);

$cText = bin2hex($aes->encryptWithIV($pText, $iv));
print "加密后: " . $cText . PHP_EOL;

$deText = $aes->decryptWithIV(hex2bin($cText), $iv);
print "解密后: " . $deText . PHP_EOL;

print PHP_EOL . "======== PHP 中支持的 cipher ========" . PHP_EOL;

print implode(PHP_EOL,openssl_get_cipher_methods());