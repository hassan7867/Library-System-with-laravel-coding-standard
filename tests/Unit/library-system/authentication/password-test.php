<?php
declare(strict_types=1);
use library_system\authentication\Password;
use Tests\TestCase;
class PasswordTest extends TestCase
{


    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider invalidData
     */

    public function test_should_not_accept_invalid_password(string $password, string $expectedMessage, int $expectedCode)
    {

        $this->expectExceptionMessage($expectedMessage);
        $this->expectExceptionCode($expectedCode);
        new Password(new NonEmptyString($password));

    }

    public function invalidData()
    {
        return [
            '3 character password' => ['abc', 'password should be valid', 111],
            '101 character password' => [str_repeat('a', 101), 'password should be valid', 111]
        ];

    }


    /**
     * @dataProvider validData
     */

    public function test_should_accept_valid_password($password)
    {
        $password = new Password(new NonEmptyString($password));
        $this->assertInstanceOf(Password::class, $password);
        $this->assertEquals(Password::class, get_class($password));
    }


    public function validData()
    {
        return [
            '5 character password' => ['abcde'],
            '99 character password' => [str_repeat('a', 99)],
            '4 character password' => ['abcd'],
            '100 character password' => [str_repeat('a', 100)]
        ];
    }


    public function tearDown(): void
    {
    }
}
