<?php

namespace travel\domain;

use Console\travel\domain\City;
use Console\travel\domain\CityName;
use Console\travel\domain\Latitude;
use Console\travel\domain\Longitude;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    public function test_when_create_object_attributes_are_the_same()
    {
        $city = City::createFromPrimitives("Barcelona", 10.10, 20.20);

        $this->assertEquals("Barcelona", $city->name()->value());
        $this->assertEquals(10.10, $city->latitude()->value());
        $this->assertEquals(20.20, $city->longitude()->value());
    }

    public function test_when_create2_object_attributes_are_the_same()
    {
        $cityName = CityName::fromValue("Barcelona");
        $latitude = Latitude::fromValue(10.10);
        $longitude = Longitude::fromValue(20.20);
        $city = City::create($cityName, $latitude, $longitude);

        $this->assertEquals("Barcelona", $city->name()->value());
        $this->assertEquals(10.10, $city->latitude()->value());
        $this->assertEquals(20.20, $city->longitude()->value());
    }
    public function test_when_compare_objects_then_results_are_ok()
    {
        $city1 = City::createFromPrimitives("Barcelona", 10.10, 20.20);
        $city2 = City::createFromPrimitives("Sevilla", 1.10, 20.20);
        $city3 = City::createFromPrimitives("Barcelona", 10.10, 20.20);
        $city4 = City::createFromPrimitives("Sevilla", 1.10, 2.55);

        $this->assertTrue($city1->isEqual($city3));
        $this->assertFalse($city2->isEqual($city4));
    }
}
