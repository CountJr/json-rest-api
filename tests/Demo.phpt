<?php
/**
 * Created by PhpStorm.
 * User: count
 * Date: 16/10/17
 * Time: 09:45
 */

use Tester\Assert;

require_once __DIR__ . "/bootstrap.php";

class Demo extends Tester\TestCase
{
    public function testOne()
    {
        Assert::same(2, 1+1);
    }
}

(new Demo())->run();
