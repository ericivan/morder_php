<?php
/**
 * Created by PhpStorm.
 * User: zhongzhiliang
 * Date: 2018/4/29
 * Time: 上午12:39
 */

namespace Modern\Di;


class Mailer
{
    public function mail($recipient, $content)
    {
        var_dump($recipient, $content);
    }
}