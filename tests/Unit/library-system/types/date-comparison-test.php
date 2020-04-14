<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use \library_system\types\DateComparsion;

class DateComparisonTests extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * Test End date should not before start date
     *
     * @param \DateTimeImmutable  $startDate
     * @param \DateTimeImmutable  $endDate
     * @param bool $expected
     * @dataProvider dataProviderForDateComparisonTest
     */
    public function test_check_end_date_should_not_before_start_date(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate, bool $expected)
    {
        $dateComparison = new DateComparsion($startDate, $endDate);
        $actual = $dateComparison->endDateShouldNotBeforeStartDate();
        $this->assertEquals($actual, $expected);
    }

    /**
     * @return array
     */
    public function dataProviderForDateComparisonTest(): array
    {
        return [
            [new \DateTimeImmutable('2019-09-09'),new \DateTimeImmutable('2019-10-10') ,true],
            [new \DateTimeImmutable('2019-09-09'),new \DateTimeImmutable('2019-09-08') ,false],
            [new \DateTimeImmutable('2019-09-09'),new \DateTimeImmutable('2019-09-07') ,false],

        ];
    }

    public function tearDown(): void
    {

    }
}