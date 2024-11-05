<?php

namespace App\Services;

class TestService
{
    public function log(string $string)
    {
        logger($string);
    }
}