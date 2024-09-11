<?php

namespace App\Http\Controllers;

use App\Models\Marslander;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public function __invoke(): View
    {
        $marslanders = Marslander::paginate(25);

        return view('collection', [
            'marslanders' => $marslanders,
        ]);
    }
}
