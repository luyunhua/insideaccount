<?php

/**
 *
 * User: luyh
 * Email: luyh@haibaobaoxian.com
 * Date: 16/12/8
 * Time: 下午5:22
 * Description: 类说明
 * Company: 大鱼网络科技
 */

namespace App\Libs\Token;

class Token
{
    public static function generate($prefix = 'insidetoken_')
    {
        return self::uuid($prefix);
    }

    public static function uuid($prefix = 'insidetoken') {
        return sprintf("{$prefix}-%04x%04x-%04x-%04x-%04x-%04x%04x%04x",

            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            mt_rand(0, 0xffff),

            mt_rand(0, 0x0fff) | 0x4000,

            mt_rand(0, 0x3fff) | 0x8000,

            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}