<?php

namespace App\Http\Controllers;

use App\Models\Reservering;
use Illuminate\Http\Request;

class ReserveringenController extends Controller
{
    // Index voor admin
    public function index()
    {
        $reserveringen = Reservering::all();
        return view('reserveringen.admin.index', compact('reserveringen'));
    }

    // Klant: reservering maken
    public function create()
    {
        return view('reserveringen.create');
    }

    // Opslaan van reservering (klant)
    public function store(Request $request)
    {
        $request->validate([
            'klant_naam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefoonnummer' => 'nullable|string|max:20',
            'datum' => 'required|date',
            'tijd' => 'required',
            'aantal_personen' => 'required|integer|min:1',
            'opmerkingen' => 'nullable|string|max:500',
        ]);

        Reservering::create($request->all());

        return redirect()->route('reserveringen.create')->with('success', 'Reservering succesvol toegevoegd!');
    }

    // Admin: bewerken
    public function edit(Reservering $reservering)
    {
        return view('reserveringen.edit', compact('reservering'));
    }

    // Admin: update
    public function update(Request $request, Reservering $reservering)
    {
        $request->validate([
            'klant_naam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefoonnummer' => 'nullable|string|max:20',
            'datum' => 'required|date',
            'tijd' => 'required',
            'aantal_personen' => 'required|integer|min:1',
            'opmerkingen' => 'nullable|string|max:500',
        ]);

        $reservering->update($request->all());

        return redirect()->route('admin.reserveringen.index')->with('success', 'Reservering bijgewerkt!');
    }

    // Admin: verwijderen
    public function destroy(Reservering $reservering)
    {
        $reservering->delete();
        return redirect()->route('admin.reserveringen.index')->with('success', 'Reservering verwijderd!');
    }
}





