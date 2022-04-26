<?php

namespace Buke\Util\Crypto;

class AESTool
{
    /**
     * 生成 AES 密钥，n 可选：16（128位算法）、24（192位算法）、32（256位算法）
     */
    public static function generateKey($n)
    {
        return openssl_random_pseudo_bytes($n);
    }

    /**
     * 生成 AES 初始向量 IV
     */
    public static function generateIV()
    {
        // 标准 AES 算法 IV 长度都是 16，非标准算法自行修改实现即可
        return openssl_random_pseudo_bytes(16);
    }
}