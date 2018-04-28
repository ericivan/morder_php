<?php
/**
 * Created by PhpStorm.
 * User: zhongzhiliang
 * Date: 2018/4/29
 * Time: 上午12:40
 */

namespace Modern\Di;


class UserManager
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function register($email, $password)
    {
        //orther logic

        $this->mailer->mail($email, 'Hello and Welcome');
    }
}