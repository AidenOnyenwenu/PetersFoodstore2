<?php

namespace App\Http\Controllers;

use App\Models\Drank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DrankController extends Controller
{
    public function index()
    {
        $dranken = Drank::all();
        return view('dranken.index', compact('dranken'));
    }

    public function create()
    {
        return view('dranken.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'prijs' => 'required|numeric|min:0',
            'omschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['naam', 'prijs', 'omschrijving']);

        if ($request->hasFile('afbeelding')) {
            $data['afbeelding'] = $request->file('afbeelding')->store('dranken', 'public');
        }

        Drank::create($data);

        return redirect()->route('dranken.index')->with('success', 'Drank succesvol toegevoegd!');
    }

    public function edit(Drank $drank)
    {
        return view('dranken.edit', compact('drank'));
    }

    public function update(Request $request, Drank $drank)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'prijs' => 'required|numeric|min:0',
            'omschrijving' => 'nullable|string',
            'afbeelding' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['naam', 'prijs', 'omschrijving']);

        if ($request->hasFile('afbeelding')) {
            // Verwijder oude afbeelding als die er is
            if ($drank->afbeelding && Storage::disk('public')->exists($drank->afbeelding)) {
                Storage::disk('public')->delete($drank->afbeelding);
            }
            $data['afbeelding'] = $request->file('afbeelding')->store('dranken', 'public');
        }

        $drank->update($data);

        return redirect()->route('dranken.index')->with('success', 'Drank succesvol bijgewerkt!');
    }

    public function destroy(Drank $drank)
    {
        if ($drank->afbeelding && Storage::disk('public')->exists($drank->afbeelding)) {
            Storage::disk('public')->delete($drank->afbeelding);
        }

        $drank->delete();

        return redirect()->route('dranken.index')->with('success', 'Drank succesvol verwijderd!');
    }
}
