<?php
declare(strict_types=1);

use Tests\TestCase;
use library_system\rack\Name;

class RackNameTest extends TestCase
{
    /**
     * @dataProvider invalidData
     */
    public function test_rack_name_should_not_accept_name_length_greater_than_500_and_less_than_2(string $fileName)
    {
        $this->expectExceptionCode(444);
        $this->expectExceptionMessage("Rack name cannot be greater than " . Name::MAX_LENGTH . " or less than " . Name::MIN_LENGTH . " characters");
        new Name(new NonEmptyString($fileName));
    }

    public function invalidData()
    {
        return [
            'rack name of 501 characters length' => [str_repeat('a', 501)],
            'rack name of 1 character length' => ['a'],
        ];
    }

    /**
     * @dataProvider validData
     */

    public function test_rack_name_should_not_accept_invalid_name_length(string $fileName)
    {
        $fileName = new Name(new NonEmptyString($fileName));
        $this->assertInstanceOf(Name::class, $fileName);
        $this->assertEquals(Name::class, get_class($fileName));
    }

    public function validData()
    {
        return [
            'rack name of 500 characters length' => [str_repeat('a', 500)],
            'rack name of 2 characters length' => ['aa'],
            'rack name of 50 characters length' => [str_repeat('a', 50)],
        ];
    }

}
