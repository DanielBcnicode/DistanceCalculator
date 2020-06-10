<?php

namespace Console\travel\domain;

use Console\travel\domain\valueObjects\Cities;

interface Algorithm
{
    public function compute(Cities $cities): Cities;
}