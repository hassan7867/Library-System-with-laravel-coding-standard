<?php
declare(strict_types=1);

namespace library_system\authentication;

class Password
{
    private $password;
    public const MIN_LENGTH = 4;
    public const MAX_LENGTH = 100;

    public function __construct(\NonEmptyString $password)
    {
        if (strlen($password->value()) < self::MIN_LENGTH || strlen($password->value()) > self::MAX_LENGTH) {

            throw new\InvalidArgumentException('password should be valid', 111);
        }
        $this->password = $password->value();
    }

    public function value(): string
    {

        return $this->password;
    }

}
