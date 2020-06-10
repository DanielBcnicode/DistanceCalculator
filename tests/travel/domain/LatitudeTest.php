<?php

declare(strict_types=1);

namespace travel\domain;

use Console\travel\domain\Latitude;
use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    public function test_when_create_the_value_is_unaltered()
    {
        $latitude = Latitude::create(10.19);

        $this->assertTrue($latitude instanceof Latitude);
        $this->assertEquals(10.19, $latitude->value());
    }

    public function test_when_compare_two_objects_then_the_results_is_ok()
    {
        $latitudeA = Latitude::create(10.9);
        $latitudeB = Latitude::create(11.19);
        $latitudeC = Latitude::create(10.9);


        $this->assertTrue($latitudeA->isEqual($latitudeC));
        $this->assertFalse($latitudeB->isEqual($latitudeC));

    }
}
