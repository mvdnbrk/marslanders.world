<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\View\View;

class HomepageController extends Controller
{
    public function __invoke(): View
    {
        $burn_count = Inscription::where('burned', true)->count();

        return view(
            'welcome',
            compact('burn_count')
        );
    }
}
