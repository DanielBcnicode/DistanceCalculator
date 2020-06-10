<?php

declare(strict_types=1);

namespace Console\travel\domain;

interface ObtainCities
{
    public function run(string $source): array;
}
