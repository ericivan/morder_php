<?php
/**
 * Created by PhpStorm.
 * User: zhongzhiliang
 * Date: 2018/4/27
 * Time: 下午10:42
 */

namespace Modern;


class HelloWorld
{

    private $foo;

    public function __construct(string $foo)
    {
        $this->foo = $foo;
    }
    public function say()
    {
        echo 'hello';
    }

    public function __invoke():void
    {
        echo 'Hello,Modern phper';
        exit;
    }
}