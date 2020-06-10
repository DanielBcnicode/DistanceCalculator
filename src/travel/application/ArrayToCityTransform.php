<?php

declare(strict_types=1);

namespace Console\travel\application;

use Console\travel\domain\valueObjects\City;
use Console\travel\domain\FieldNotFoundInTransformation;
use Console\travel\domain\TransformToCity;

class ArrayToCityTransform implements TransformToCity
{
    /**
     * @throws FieldNotFoundInTransformation
     */
    public static function city($values): City
    {
        if (
            !key_exists('Name', $values) ||
            !key_exists('Lat', $values) ||
            !key_exists('Lon', $values)
        ) {
            throw new FieldNotFoundInTransformation("Some field does not exist.");
        }
        return City::createFromPrimitives(
            $values['Name'],
            (float)$values['Lat'],
            (float)$values['Lon']
            );
    }
}
