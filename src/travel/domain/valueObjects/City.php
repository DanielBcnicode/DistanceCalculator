<?php

namespace Console\travel\domain\valueObjects;

class City
{
    const PI = 3.13159265;
    const RADIU = 6378;

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
            CityName::fromValue($name),
            Latitude::fromValue($latitude),
            Longitude::fromValue($longitude)
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

    public function distanceTo(City $city): Distance
    {
        $lat1 = $this->latitude->value() * self::PI / 180;
        $lat2 = $city->latitude()->value() * self::PI / 180;
        $long1 = $this->longitude->value() * self::PI / 180;
        $long2 = $city->longitude()->value() * self::PI / 180;

        $deltaLat = $lat2 - $lat1;
        $deltaLong = $long2 - $long1;
        $a = pow(sin($deltaLat / 2), 2.0) + cos($lat1) *
            cos($lat2) * pow(sin($deltaLong / 2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return Distance::fromValue(self::RADIU * $c);
    }
}
