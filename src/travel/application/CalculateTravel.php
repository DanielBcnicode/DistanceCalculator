<?php

namespace Console\travel\application;

use Console\travel\domain\ObtainCities;
use Console\travel\domain\TransformToCity;

class CalculateTravel
{

    private ObtainCities $obtainCities;
    private TransformToCity $transformTo;

    public function __construct(
        ObtainCities $obtainCities,
        TransformToCity $transformTo
    )
    {
        $this->obtainCities = $obtainCities;
        $this->transformTo = $transformTo;
    }

    public function execute($file): array
    {
        $cities = [];
        $data = $this->obtainCities->run($file);
        foreach ($data as $datum) {
            $cities[] = $this->transformTo::city($datum);
        }
        return $cities;
    }
}