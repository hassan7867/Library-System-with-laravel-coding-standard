<?php
declare(strict_types=1);
use library_system\authentication\UserName;
use Tests\TestCase;
class UserNameTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider invalidData
     */

    public function test_username_should_not_be_greater_than_100_and_less_than_2_characters($userName, $expectedMessage, $expectedCode)
    {

        $this->expectExceptionMessage($expectedMessage);
        $this->expectExceptionCode($expectedCode);
        new UserName(new NonEmptyString($userName));

    }

    public function invalidData()
    {
        return [
            '1 character length' => ['a', 'Username should be greater than ' . UserName::MIN_LENGTH . ' and less than ' . UserName::MAX_LENGTH . ' characters', 101],
            '101 character length' => [str_repeat('a', 101), 'Username should be greater than ' . UserName::MIN_LENGTH . ' and less than ' . UserName::MAX_LENGTH . ' characters', 101],

        ];
    }


    /**
     * @dataProvider validData
     */

    public function test_should_accept_valid_username_length($string)
    {

        $userName = new UserName(new NonEmptyString($string));
        $this->assertInstanceOf(UserName::class, $userName);
        $this->assertEquals(UserName::class, get_class($userName));

    }

    public function validData()
    {

        return [
            '3 character length' => ['abc'],
            '2 character length' => ['aa'],
            '100 character length' => [str_repeat('a', 100)],
            '99 character length' => [str_repeat('a', 99)],

        ];
    }

    public function tearDown(): void
    {
    }
}
