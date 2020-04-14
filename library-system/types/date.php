<?php

declare(strict_types=1);

namespace library_system\types;

class Date{
    private $value;

    public function __construct(string $value){
        $this->value = $value;
    }

    public function isEmpty(){
        return empty($this->value) ? true : false;
    }

    public function value(){
        return $this->value;
    }
}
