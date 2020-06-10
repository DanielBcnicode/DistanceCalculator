<?php

namespace Console\travel\application;

use Console\travel\domain\Algorithm;
use Console\travel\domain\valueObjects\Cities;
use Console\travel\domain\valueObjects\City;
use Console\travel\domain\ObtainCities;
use Console\travel\domain\TransformToCity;

class CalculateTravel
{

    private ObtainCities $obtainCities;
    private TransformToCity $transformTo;
    private Algorithm $algorithm;

    public function __construct(
        ObtainCities $obtainCities,
        TransformToCity $transformTo,
        Algorithm $algorithm
    )
    {
        $this->obtainCities = $obtainCities;
        $this->transformTo = $transformTo;
        $this->algorithm = $algorithm;
    }

    public function execute($file): array
    {
        $cities = $this->getCities($file);
        $citiesOrdered = $this->algorithm->compute(Cities::fromArrayOfCities($cities));

        return $this->transformResponse($citiesOrdered);
    }

    private function getCities($file): array
    {
        $cities = [];
        $data = $this->obtainCities->run($file);
        foreach ($data as $datum) {
            $cities[] = $this->transformTo::city($datum);
        }

        return $cities;
    }

    private function transformResponse(Cities $cities): array
    {
        $nameList = [];
        /** @var \Console\travel\domain\valueObjects\City $city */
        foreach ($cities->data() as $city) {
            $nameList[] = $city->name()->value();
        }

        return $nameList;
    }
}