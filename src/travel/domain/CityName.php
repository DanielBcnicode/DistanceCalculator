<?php

namespace Console\travel\domain;

class CityName
{
    private string $value;

    /**
     * @throws WrongCityName
     */
    private function __construct(string $value)
    {
        if (strlen($value) == 0) {
            throw new WrongCityName("The CityName can't be empty.");
        }
        $this->value = $value;
    }

    /**
     * @throws WrongCityName
     */
    public static function create(string $value) : self
    {
        return new static($value);
    }

    public function isEqual(self $value) : bool
    {
        return $value->value() == $this->value ? true : false;
    }

    public function value(): string
    {
        return $this->value;
    }
}