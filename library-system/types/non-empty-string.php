<?php

class NonEmptyString
{
    private $text;

    public function __construct(string $text)
    {
        if (empty($text) || ctype_space($text)) {
            throw new \InvalidArgumentException("Text should not be empty!", 001);
        }
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->text;
    }
}
