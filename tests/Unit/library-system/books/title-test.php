<?php
declare(strict_types=1);

use Tests\TestCase;
use library_system\books\Title;

class BookTitleTest extends TestCase
{
    /**
     * @dataProvider invalidData
     */
    public function test_title_should_not_accept_name_length_greater_than_500_and_less_than_2(string $fileName)
    {
        $this->expectExceptionCode(444);
        $this->expectExceptionMessage("Title cannot be greater than " . Title::MAX_LENGTH . " or less than " . Title::MIN_LENGTH . " characters");
        new Title(new NonEmptyString($fileName));
    }

    public function invalidData()
    {
        return [
            'book title of 501 characters length' => [str_repeat('a', 501)],
            'book title of 1 character length' => ['a'],
        ];
    }

    /**
     * @dataProvider validData
     */

    public function test_title_should_not_accept_invalid_title_length(string $fileName)
    {
        $fileName = new Title(new NonEmptyString($fileName));
        $this->assertInstanceOf(Title::class, $fileName);
        $this->assertEquals(Title::class, get_class($fileName));
    }

    public function validData()
    {
        return [
            'book title of 500 characters length' => [str_repeat('a', 500)],
            'book title of 2 characters length' => ['aa'],
            'book title of 50 characters length' => [str_repeat('a', 50)],
        ];
    }

}
