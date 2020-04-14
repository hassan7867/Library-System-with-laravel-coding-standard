<?php
declare(strict_types=1);

namespace library_system\authentication;
class Email
{
    private $email;

    public function __construct(string $email)
    {
        if (!preg_match("/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)) {
            throw new\InvalidArgumentException('Email should be valid', 124);
        }
        $this->email = $email;
    }

    public function value()
    {
        return $this->email;
    }


}
