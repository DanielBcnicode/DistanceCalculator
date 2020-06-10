<?php

namespace travel\application;

use Console\travel\application\ArrayToCityTransform;
use Console\travel\domain\FieldNotFoundInTransformation;
use PHPUnit\Framework\TestCase;

class ArrayToCityTransformTest extends TestCase
{
    public function test_when_transform_an_array_the_result_is_ok()
    {
        $dataTest = [
            "Name" => "Barcelona",
            "Lat" => 10.10,
            "Lon" => 20.20
        ];

        $city = ArrayToCityTransform::city($dataTest);

        $this->assertEquals("Barcelona", $city->name()->value());
        $this->assertEquals(10.10, $city->latitude()->value());
        $this->assertEquals(20.20, $city->longitude()->value());
    }

    public function test_when_transform_an_wrong_array_the_result_is_ok()
    {
        $this->expectException(FieldNotFoundInTransformation::class);

        $dataTest = [
            "Name" => "Barcelona",
            "Lon" => 20.20
        ];

        $city = ArrayToCityTransform::city($dataTest);
    }
}
