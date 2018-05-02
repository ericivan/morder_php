<?php
/**
 * Created by PhpStorm.
 * User: zhongzhiliang
 * Date: 2018/5/2
 * Time: 下午11:06
 */

namespace Modern\Di;


class Video
{
    /**
     * @Inject
     * @var Mailer
     */
    private $mail;

    /**
     * Video constructor.
     * @Inject
     * @param Mailer $mail
     */
    public function __construct($mail)
    {
        $this->mail = $mail;
    }

    public function send()
    {
        $this->mail->mail('haha', 'inject');
    }

}