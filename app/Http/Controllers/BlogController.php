<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SluggableTrait;

class BlogController extends Controller
{
    use SluggableTrait;

    public function index()
    {
        $title = 'test title';
        return $this->generateSlug($title);
        
    }
}
