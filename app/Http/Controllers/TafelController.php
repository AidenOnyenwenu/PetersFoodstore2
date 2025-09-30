<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tafel;

class TafelController extends Controller
{
    public function index()
    {
        $tafels = Tafel::all();
        return view('tafels.index', compact('tafels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'soort' => 'required|string|max:255',
            'aantal' => 'required|integer|min:1',
        ]);

        $tafel = Tafel::create($request->only(['soort', 'aantal']));

        return redirect()->route('tafels.index')
            ->with('success', "Tafel '{$tafel->soort}' ({$tafel->aantal}x) succesvol toegevoegd! ✅");
    }

    public function destroy(Tafel $tafel)
    {
        $tafel->delete();
        return redirect()->route('tafels.index')
            ->with('success', "Tafel '{$tafel->soort}' verwijderd! ❌");
    }
}


