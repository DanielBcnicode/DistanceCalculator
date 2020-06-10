<?php

declare(strict_types=1);

namespace Console\travel\domain;

class NearestCityAlgorithm implements Algorithm
{
    private array $list;
    public function compute(Cities $cities): Cities
    {
        $cityList = $cities->data();
        $currentCity = array_shift($cityList);
        $this->list[] = $currentCity;
        $this->calculateNearest($currentCity, $cityList);
        return Cities::fromArrayOfCities($this->list);
    }

    private function calculateNearest(City $currentCity, array &$cityList)
    {
        if (count($cityList) == 0) {
            return;
        }

        $currentMinorDistanceIndex = 0;
        $currentMinorDistance = 10000000000000.0;

        foreach ($cityList as $key => $city) {
            $distance = $currentCity->distanceTo($city)->value();
            if ($distance < $currentMinorDistance) {
                $currentMinorDistance = $distance;
                $currentMinorDistanceIndex = $key;
            }
        }
        $currentCity = $cityList[$currentMinorDistanceIndex];
        $this->list[] = $currentCity;
        array_splice($cityList, $currentMinorDistanceIndex, 1);

        $this->calculateNearest($currentCity, $cityList);
    }
}
