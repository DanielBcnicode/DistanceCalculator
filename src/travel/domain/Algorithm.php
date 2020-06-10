<?php

namespace Console\travel\domain;

interface Algorithm
{
    public function compute(Cities $cities): Cities;
}