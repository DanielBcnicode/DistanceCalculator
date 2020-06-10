<?php

namespace Console\travel\domain\valueObjects;

class FloatValue
{
    private float $value;

    private function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function fromValue(float $value) : self
    {
        return new static($value);
    }

    public function isEqual(self $value) : bool
    {
        return $value->value() == $this->value ? true : false;
    }

    public function value(): float
    {
        return $this->value;
    }
}