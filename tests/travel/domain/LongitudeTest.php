<?php

declare(strict_types=1);

namespace travel\domain;

use Console\travel\domain\Longitude;
use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    public function test_when_create_the_value_is_unaltered()
    {
        $longitude = Longitude::create(10.19);

        $this->assertTrue($longitude instanceof Longitude);
        $this->assertEquals(10.19, $longitude->value());
    }

    public function test_when_compare_two_objects_then_the_results_is_ok()
    {
        $longitudeA = Longitude::create(10.9);
        $longitudeB = Longitude::create(11.19);
        $longitudeC = Longitude::create(10.9);


        $this->assertTrue($longitudeA->isEqual($longitudeC));
        $this->assertFalse($longitudeB->isEqual($longitudeC));

    }
}
