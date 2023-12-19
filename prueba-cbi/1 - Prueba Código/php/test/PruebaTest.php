<?php

namespace Cbi\Tests;
use \PHPUnit\Framework\TestCase;

/**
 *
 */
class PruebaTest extends TestCase
{

	public function testFrameworkConfigured()
	{
		$this->assertTrue(true);
	}

	public function testTresEnRaya()
	{
		$this->assertEquals(true, false);
	}
}
