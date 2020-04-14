<?php
declare(strict_types=1);
use Tests\TestCase;
use library_system\authentication\Email;
class EmailTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider invalidData
     */
    public function test_should_not_accept_invalid_email($email, $expectedMessage, $expectedCode)
    {

        $this->expectExceptionCode($expectedCode);
        $this->expectExceptionMessage($expectedMessage);
        new Email($email);
    }

    public function invalidData()
    {
        return [
            'Domain name should not be an IP address' => ['email@123.123.123.123', 'Email should be valid', 124],
            'Domain name should not be an IP address either containing square brackets' => ['email@[123.123.123.123]', 'Email should be valid', 124],
            'Quotes around email is not considered valid' => ['ema.com', 'Email should be valid', 124],
            'empty email' => ['', 'Email should be valid', 124]
        ];

    }

    /**
     * @dataProvider validData
     */

    public function test_should_accept_valid_email($email)
    {

        $email = new Email($email);
        $this->assertInstanceOf(Email::class, $email);
        $this->assertEquals(Email::class, get_class($email));

    }

    public function validData()
    {

        return [
            'A Valid email' => ['email@domain.com'],
            'Email containing dot in the address field is valid' => ['firstname.lastname@domain.com'],
            'Email containing dot with the subdomain is valid' => ['email@subdomain.domain.com'],
            'Plus sign is considered valid character in email' => ['firstname+lastname@domain.com'],
            'Digits in email are valid' => ['1234567890@domain.com'],
        ];

    }

    public function tearDown(): void
    {
    }
}
