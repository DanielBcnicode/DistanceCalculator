<?php

namespace Console\travel\domain;

interface TransformToCity
{
    public static function city($values): City;
}