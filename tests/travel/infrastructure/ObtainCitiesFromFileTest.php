<?php

namespace test\travel\infrastructure;

use Console\travel\domain\CitiesSourceNotFound;
use Console\travel\domain\ParseFileError;
use Console\travel\infrastructure\ObtainCitiesFromFile;
use PHPUnit\Framework\TestCase;

class ObtainCitiesFromFileTest extends TestCase
{
    public function test_when_load_bad_file_throw_an_exception()
    {
        $this->expectException(CitiesSourceNotFound::class);

        $service = new ObtainCitiesFromFile();
        $data = $service->run("none");
    }

    public function test_when_load_file_retuns_an_array()
    {
        $service = new ObtainCitiesFromFile();
        $data = $service->run("tests/travel/infrastructure/cities_test.txt");

        $this->assertTrue(count($data) > 10);
        $this->assertEquals(['Name' => 'Beijing', 'Lat' => '39.93', 'Lon' => '116.40'], $data[0]);
    }

    public function test_when_load_bad_formatted_file_throw_an_exception()
    {
        $this->expectException(ParseFileError::class);

        $service = new ObtainCitiesFromFile();
        $data = $service->run("tests/travel/infrastructure/cities_bad_test.txt");
    }

}
