<?php

declare(strict_types=1);

namespace travel\domain;

use Console\travel\domain\valueObjects\FloatValue;
use PHPUnit\Framework\TestCase;

class FloatValueTest extends TestCase
{
    public function test_when_create_the_value_is_unaltered()
    {
        $coordinate = FloatValue::fromValue(10.19);

        $this->assertTrue($coordinate instanceof FloatValue);
        $this->assertEquals(10.19, $coordinate->value());
    }

    public function test_when_compare_two_objects_then_the_results_is_ok()
    {
        $coordinateA = FloatValue::fromValue(10.9);
        $coordinateB = FloatValue::fromValue(11.19);
        $coordinateC = FloatValue::fromValue(10.9);


        $this->assertTrue($coordinateA->isEqual($coordinateC));
        $this->assertFalse($coordinateB->isEqual($coordinateC));

    }
}
