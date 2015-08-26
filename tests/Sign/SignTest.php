<?php
namespace SignTest;

use PHPUnit_Framework_TestCase;

use Sign\Sign;

class SignTest extends PHPUnit_Framework_TestCase
{
	public function testCanInstansiate()
	{
		$s = new Sign();
	}
}