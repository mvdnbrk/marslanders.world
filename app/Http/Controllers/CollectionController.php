<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        return view('collection');
    }
}
