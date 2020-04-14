<?php
declare(strict_types=1);

namespace library_system\books;

class AuthorName
{
    private $name;
    public const MIN_LENGTH = 2;
    public const MAX_LENGTH = 500;

    public function __construct(\NonEmptyString $name)
    {
        if (strlen($name->value()) > self::MAX_LENGTH || strlen($name->value()) < self::MIN_LENGTH) {
            throw new \InvalidArgumentException("Author name cannot be greater than " . self::MAX_LENGTH . " or less than ". self::MIN_LENGTH. " characters", 444);
        }
        $this->name = $name->value();
    }

    public function value()
    {
        return $this->name;
    }
}
