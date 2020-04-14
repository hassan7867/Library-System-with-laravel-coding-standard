<?php
/**
 * Created by PhpStorm.
 * User: TALHA
 * Date: 9/30/2019
 * Time: 3:31 PM
 */

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use \library_system\types\NonEmptyString;

class NonEmptyStringTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_should_not_accept_empty_string()
    {
        $string = "";
        $this->expectExceptionCode(001);
        $this->expectExceptionMessage("Text should not be empty!");
        new NonEmptyString($string);
    }

    public function test_should_accept_non_empty_string()
    {
        $string = "store";
        $name = new NonEmptyString($string);
        $this->assertInstanceOf('NonEmptyString', $name);
        $this->assertEquals('NonEmptyString', get_class($name));
        $this->assertEquals('store', $string, 'Both must get the same value');
    }

    public function tearDown(): void
    {
    }

}
