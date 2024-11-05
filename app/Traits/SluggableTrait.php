<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SluggableTrait {
    public function generateSlug($slugString)
    {
        return Str::slug($slugString);
    }
}