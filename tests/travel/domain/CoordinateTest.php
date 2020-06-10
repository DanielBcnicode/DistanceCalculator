<?php

declare(strict_types=1);

namespace travel\domain;

use Console\travel\domain\Coordinate;
use PHPUnit\Framework\TestCase;

class CoordinateTest extends TestCase
{
    public function test_when_create_the_value_is_unaltered()
    {
        $coordinate = Coordinate::create(10.19);

        $this->assertTrue($coordinate instanceof Coordinate);
        $this->assertEquals(10.19, $coordinate->value());
    }

    public function test_when_compare_two_objects_then_the_results_is_ok()
    {
        $coordinateA = Coordinate::create(10.9);
        $coordinateB = Coordinate::create(11.19);
        $coordinateC = Coordinate::create(10.9);


        $this->assertTrue($coordinateA->isEqual($coordinateC));
        $this->assertFalse($coordinateB->isEqual($coordinateC));

    }
}
