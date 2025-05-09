<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\InscriptionTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function show(): View
    {
        $typesAndValues = InscriptionTrait::getTypesAndValues();

        return view('search', compact('typesAndValues'));
    }

    public function redirect(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'query' => [
                'required',
                'string',
                'max:67',
            ],
        ]);

        $query = Str::of($validated['query'])->after('#')->toString();

        $inscription = Inscription::where('name', 'LIKE', "%#{$query}")
            ->orWhere('inscription_id', $query)
            ->orderBy('name')
            ->first();

        if ($inscription) {
            return redirect()->route('inscription', $inscription);
        }

        return redirect()->back()->with('error', 'No Mars Lander found with the given query.');
    }
}
