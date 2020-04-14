<?php
declare(strict_types=1);

namespace library_system\types;

class DateComparsion
{
    private $startDate;
    private $endDate;

    public function __construct(\DateTimeImmutable $startDate, \DateTimeImmutable $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function endDateShouldNotBeforeStartDate()
    {
        return $this->endDate <= $this->startDate ? false : true;
    }
}
