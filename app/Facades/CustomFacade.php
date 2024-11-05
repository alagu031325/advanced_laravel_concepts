<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CustomFacade extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        // which service in the container this facade to map to - then the methods of that service can be statically accessed without dependancy injection or auto loading
        return 'custom-service';
    }
}