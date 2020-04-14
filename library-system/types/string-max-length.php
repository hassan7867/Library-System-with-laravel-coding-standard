<?php

namespace library_system\types;

Class StringMaxLength
{
    private $string;
    public const MAX_LENGTH = 100;

    public function __construct(NonEmptyString $string)
    {
        if ($this->stringShouldNotBeGreaterThanGivenLength($string->value())) {
            $this->string = $string->value();
        }
    }

    private function stringShouldNotBeGreaterThanGivenLength(string $string): string
    {
        if (strlen($string) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException("String Should Not Be Longer Than " . self::MAX_LENGTH . " Characters", 001);
        }
        return true;
    }

    public function value()
    {
        return $this->string;
    }
}
