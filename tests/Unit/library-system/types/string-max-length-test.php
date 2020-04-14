<?php

declare(strict_types=1);

use library_system\types\NonEmptyString;
use PHPUnit\Framework\TestCase;
use \library_system\types\StringMaxLength;

Class StringMaxLengthTest extends TestCase
{
    /**
     * @dataProvider invalidData
     */
    public function test_given_string_length_should_not_be_greater_than_given_length($string, $expectedMsg, $expectedCode)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode($expectedCode);
        $this->expectExceptionMessage($expectedMsg);
        new StringMaxLength(new NonEmptyString($string));

    }

    public function invalidData()
    {
        return [
            '101 string length' => [str_repeat('a', 101), 'String Should Not Be Longer Than ' . StringMaxLength::MAX_LENGTH . ' Characters', 001],
            '150 string length' => [str_repeat('a', 150), 'String Should Not Be Longer Than ' . StringMaxLength::MAX_LENGTH . ' Characters', 001],
            '200 string length' => [str_repeat('a', 200), 'String Should Not Be Longer Than ' . StringMaxLength::MAX_LENGTH . ' Characters', 001],
        ];
    }
    /**
     * @dataProvider validData
     */
    public function test_given_string_length_should_be_less_than_given_length($string)
    {
        $stringLength = new StringMaxLength(new NonEmptyString($string));
        $this->assertInstanceOf('StringMaxLength', $stringLength);
        $this->assertEquals('StringMaxLength', get_class($stringLength));
        $this->assertEquals($stringLength->value(), $string, 'Both must get the same value');

    }

    public function validData()
    {
        return [
            '50 string length' => [str_repeat('a', 50)],
            '30 string length' => [str_repeat('a', 30)],
            '70 string length' => [str_repeat('a', 70)],
        ];
    }
}
