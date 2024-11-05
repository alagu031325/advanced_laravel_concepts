<?php 

namespace App\Services;

class CustomService {
    // we can statically access this method via facade
    public function SomeMethod()
    {
        return 'Hello, this is a test mthd from custom facade';
    }
}