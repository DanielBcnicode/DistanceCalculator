<?php

namespace Console\travel\domain;

class Cities
{
    private array $data;

    private function __construct($data)
    {
        $this->data = $data;
    }

    public function data()
    {
        return $this->data;
    }

    /** @throws NotCityObject */
    public function add(City $city): void
    {
        if (! $city instanceof City) {
            throw new NotCityObject();
        }
        $this->data[] = $city;
    }

    /** @throws NotCityObject */
    public static function fromArrayOfCities($cities): self
    {
        /** @var City $city */
        foreach ($cities as $city) {
            if (! $city instanceof City) {
                throw new NotCityObject();
            }
        }
        return new self($cities);
    }
}
