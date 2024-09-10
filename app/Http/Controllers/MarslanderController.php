<?php

namespace App\Http\Controllers;

use App\Models\Marslander;
use Illuminate\View\View;

class MarslanderController extends Controller
{
    public function __invoke(Marslander $marslander): View
    {
        return view('marslander', [
            'marslander' => $marslander,
        ]);
    }
}
