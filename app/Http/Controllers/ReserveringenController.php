<?php

namespace App\Http\Controllers;

use App\Models\Reservering;
use Illuminate\Http\Request;

class ReserveringenController extends Controller
{
    // Toon alle reserveringen
    public function index()
    {
        $reserveringen = Reservering::all();
        return view('reserveringen.index', compact('reserveringen'));
    }

    // Toon formulier voor nieuwe reservering
    public function create()
    {
        return view('reserveringen.create');
    }

    // Opslaan van nieuwe reservering
    public function store(Request $request)
    {
        $data = $request->validate([
            'klant_naam' => 'required|string|max:255',
            'email' => 'required|email',
            'telefoonnummer' => 'nullable|string|max:20',
            'datum' => 'required|date',
            'tijd' => 'required',
            'aantal_personen' => 'required|integer|min:1',
            'opmerkingen' => 'nullable|string',
        ]);

        Reservering::create($data);

        return redirect()->route('reserveringen.index')
                         ->with('success', 'Reservering succesvol toegevoegd!');
    }

    // Toon formulier om reservering te bewerken
    public function edit(Reservering $reservering)
    {
        return view('reserveringen.edit', compact('reservering'));
    }

    // Update een bestaande reservering
    public function update(Request $request, Reservering $reservering)
    {
        $data = $request->validate([
            'klant_naam' => 'required|string|max:255',
            'email' => 'required|email',
            'telefoonnummer' => 'nullable|string|max:20',
            'datum' => 'required|date',
            'tijd' => 'required',
            'aantal_personen' => 'required|integer|min:1',
            'opmerkingen' => 'nullable|string',
        ]);

        $reservering->update($data);

        return redirect()->route('reserveringen.index')
                         ->with('success', 'Reservering bijgewerkt!');
    }

    // Verwijder een reservering
    public function destroy(Reservering $reservering)
    {
        $reservering->delete();

        return redirect()->route('reserveringen.index')
                         ->with('success', 'Reservering verwijderd!');
    }
}
