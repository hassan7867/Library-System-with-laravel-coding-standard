<?php
declare(strict_types=1);

namespace library_system\authentication;

class UserName
{
    public const MIN_LENGTH = 2;
    public const MAX_LENGTH = 100;

    private $userName;

    public function __construct(\NonEmptyString $userName)
    {
        if (strlen($userName->value()) < self::MIN_LENGTH || strlen($userName->value()) > self::MAX_LENGTH) {
            throw new\InvalidArgumentException('Username should be greater than ' . self::MIN_LENGTH . ' and less than ' . self::MAX_LENGTH . ' characters', 101);
        }

        $this->userName = $userName->value();
    }

    public function value()
    {
        return $this->userName;
    }
}
