<?php
declare(strict_types=1);

use Tests\TestCase;
use library_system\books\AuthorName;

class AuthorNameTest extends TestCase
{
    /**
     * @dataProvider invalidData
     */
    public function test_author_name_should_not_accept_name_length_greater_than_500_and_less_than_2(string $fileName)
    {
        $this->expectExceptionCode(444);
        $this->expectExceptionMessage("Author name cannot be greater than " . AuthorName::MAX_LENGTH . " or less than " . AuthorName::MIN_LENGTH . " characters");
        new AuthorName(new NonEmptyString($fileName));
    }

    public function invalidData()
    {
        return [
            'author name of 501 characters length' => [str_repeat('a', 501)],
            'author name of 1 character length' => ['a'],
        ];
    }

    /**
     * @dataProvider validData
     */

    public function test_author_name_should_not_accept_invalid_name_length(string $fileName)
    {
        $fileName = new AuthorName(new NonEmptyString($fileName));
        $this->assertInstanceOf(AuthorName::class, $fileName);
        $this->assertEquals(AuthorName::class, get_class($fileName));
    }

    public function validData()
    {
        return [
            'author name of 500 characters length' => [str_repeat('a', 500)],
            'author name of 2 characters length' => ['aa'],
            'author name of 50 characters length' => [str_repeat('a', 50)],
        ];
    }

}
