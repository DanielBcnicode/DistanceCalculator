<?php

namespace travel\domain;

use Console\travel\domain\NearestCityAlgorithm;
use Console\travel\domain\valueObjects\Cities;
use Console\travel\domain\valueObjects\City;
use PHPUnit\Framework\TestCase;

class NearestCityAlgorithmTest extends TestCase
{
    /** @test */
    public function when_use_the_algorithm_then_return_ordered_list()
    {
        $city1 = City::createFromPrimitives("a" , 1,1);
        $city4 = City::createFromPrimitives("b" , 1,2);
        $city2 = City::createFromPrimitives("c" , 1,4);
        $city3 = City::createFromPrimitives("d" , 1,10);
        $cities = Cities::fromArrayOfCities([$city1, $city4, $city2, $city3]);

        $algorithm = new NearestCityAlgorithm();
        $result = $algorithm->compute($cities);
        $result = $result->data();
        $this->assertEquals(4,count($result));
        $this->assertEquals("a", $result[0]->name()->value());
        $this->assertEquals("b", $result[1]->name()->value());
        $this->assertEquals("c", $result[2]->name()->value());
        $this->assertEquals("d", $result[3]->name()->value());

    }
}
