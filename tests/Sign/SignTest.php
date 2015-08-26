<?php
namespace SignTest;

require_once(__DIR__.'/../../vendor/autoload.php');

use PHPUnit_Framework_TestCase;

use Sign\Sign;

class SignTest extends PHPUnit_Framework_TestCase
{
    public function testCanInstansiate()
    {
        $sign = new Sign();
        $sign->addLine(' Foo  ')->color(2,10, 'red')->end();
    }
}