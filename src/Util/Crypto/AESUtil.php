<?php

namespace Buke\Util\Crypto;

class AESUtil
{
    /**
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

    public function encryptWithIV($plainText, $iv)
    {
        return openssl_encrypt($plainText, $this->cipher, $this->key, 0, $iv);
    }

    public function decryptWithIV($cipherText, $iv)
    {
        return openssl_decrypt($cipherText, $this->cipher, $this->key, 0, $iv);
    }
}