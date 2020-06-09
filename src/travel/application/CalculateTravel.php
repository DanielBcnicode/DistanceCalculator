<?php

namespace Console\travel\application;

use Console\travel\domain\ObtainCities;

class CalculateTravel
{

    /** @var ObtainCities */
    private $obtainCities;

    public function __construct(
        ObtainCities $obtainCities
    )
    {
        $this->obtainCities = $obtainCities;
    }

    public function execute($file): array
    {
        $data = $this->obtainCities->run($file);
        dump($data);
        return $data;
    }
}