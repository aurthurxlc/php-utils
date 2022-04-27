<?php

namespace Buke\Util\Crypto;

class AESUtil
{
    /**
     * PHP 7+ 适用
     *
     * $cipher 加密方法，可选参数：aes-{keySize}-{aesMode}，其中 keySize 可选 128、192、256（需要与 $key 长度对应），aesMode 可选：cbc、cfb、ofb...
     * $key 密钥
     */
    private $cipher;
    private $key;

    function __construct($cipher, $key)
    {
        $this->cipher = $cipher;
        $this->key = $key;
    }

    /**
     * @param $plainText string 待加密明文字符串
     * @param $iv string 初始向量
     */
    public function encryptWithIV(string $plainText, string $iv)
    {
        // OPENSSL_RAW_DATA 默认采用 PKCS#7 数据填充模式
        return openssl_encrypt($plainText, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
    }

    /**
     * @param $cipherText string 待解密明文字符串
     * @param $iv string 初始向量
     */
    public function decryptWithIV(string $cipherText, string $iv)
    {
        // OPENSSL_RAW_DATA 默认采用 PKCS#7 数据填充模式
        return openssl_decrypt($cipherText, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
    }
}