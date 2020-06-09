<?php

namespace Console\travel\domain;

interface ObtainCities
{
    public function run(string $source): array;
}