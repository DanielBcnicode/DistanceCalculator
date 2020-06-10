<?php

namespace travel\domain;

use Console\travel\domain\valueObjects\Cities;
use Console\travel\domain\valueObjects\City;
use PHPUnit\Framework\TestCase;

class CitiesTest extends TestCase
{

    public function testData()
    {
        $city1 = City::createFromPrimitives("Barcelona", 10.10,20.20);
        $city2 = City::createFromPrimitives("Valencia", 10.40,20.20);
        $city3 = City::createFromPrimitives("Burgos", 99.40,120.20);
        $city4 = \Console\travel\domain\valueObjects\City::createFromPrimitives("El Prat", 56.99    ,120.20);

        $emptyCities = Cities::fromArrayOfCities([]);
        $cities = \Console\travel\domain\valueObjects\Cities::fromArrayOfCities([$city1,$city2]);
        $this->assertEquals(0, count($emptyCities->data()));
        $this->assertEquals(2, count($cities->data()));

        $cities->add($city3);
        $this->assertEquals(3, count($cities->data()));

        $newCities = clone $cities;
        $newCities->add($city4);
        $this->assertEquals(3, count($cities->data()));
        $this->assertEquals(4, count($newCities->data()));
    }
}
