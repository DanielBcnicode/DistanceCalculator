<?php

namespace Console\travel\domain;

use Console\travel\domain\valueObjects\City;

interface TransformToCity
{
    public static function city($values): City;
}