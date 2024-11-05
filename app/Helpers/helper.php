<?php

use Illuminate\Support\Str;

//Holds all global functions
//convert into a global function to access it from all the classes
function slug(string $slugString)
{
    $slug = Str::slug($slugString);
    return $slug;
}