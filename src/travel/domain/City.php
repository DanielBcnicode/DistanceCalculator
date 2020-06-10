<?php

namespace Console\travel\domain;

class City
{
    private CityName $name;
    private Longitude $longitude;
    private Latitude $latitude;

    private function __construct(CityName $name, Latitude $latitude, Longitude $longitude)
    {
        $this->name = $name;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    static function create(CityName $name, Latitude $latitude, Longitude $longitude): self
    {
        return new self($name, $latitude, $longitude);
    }

    static function createFromPrimitives(string $name, float $latitude, float $longitude): self
    {
        return new self(
            CityName::create($name),
            Latitude::create($latitude),
            Longitude::create($longitude)
        );
    }

    public function name(): CityName
    {
        return $this->name;
    }

    public function longitude(): Longitude
    {
        return $this->longitude;
    }

    public function latitude(): Latitude
    {
        return $this->latitude;
    }

    public function isEqual(self $otherCity): bool {

        if (
            $this->name->isEqual($otherCity->name()) &&
            $this->latitude->isEqual($otherCity->latitude) &&
            $this->longitude->isEqual($otherCity->longitude())
        ) {
            return true;
        }

        return false;
    }
}