<?php

declare(strict_types=1);

namespace travel\domain;

use Console\travel\domain\CityName;
use Console\travel\domain\WrongCityName;
use PHPUnit\Framework\TestCase;

class CityNameTest extends TestCase
{
    public function test_when_create_the_value_is_unaltered()
    {
        $cityName = CityName::create("Barcelona");

        $this->assertEquals("Barcelona", $cityName->value());
    }

    public function test_when_create_with_empty_name_then_an_exception_thrown()
    {
        $this->expectException(WrongCityName::class);

        $cityName = CityName::create("");
    }

    public function test_when_compare_two_objects_then_the_results_is_ok()
    {
        $cityNameA = CityName::create("Barcelona");
        $cityNameB = CityName::create("Tokio");
        $cityNameC = CityName::create("Barcelona");

        $this->assertTrue($cityNameA->isEqual($cityNameC));
        $this->assertFalse($cityNameB->isEqual($cityNameC));
    }
}
