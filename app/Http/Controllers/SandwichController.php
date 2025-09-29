<?php

namespace App\Http\Controllers;

use App\Models\Sandwich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SandwichController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sandwiches = Sandwich::withCount('ingredients')->latest()->get();
        return view('sandwiches.index', compact('sandwiches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sandwiches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients.*.name' => 'required_with:ingredients|string|max:255',
            'ingredients.*.quantity' => 'nullable|string|max:255',
        ]);

        $sandwich = Sandwich::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        $ingredients = collect($request->input('ingredients', []))
            ->filter(fn($row) => !empty($row['name']))
            ->map(function ($row) use ($sandwich) {
                return [
                    'sandwich_id' => $sandwich->id,
                    'name' => $row['name'],
                    'quantity' => $row['quantity'] ?? null,
                ];
            })->values()->all();

        if (!empty($ingredients)) {
            $sandwich->ingredients()->createMany($ingredients);
        }

        return redirect()->route('sandwiches.index')->with('success', 'Sandwich aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sandwich $sandwich)
    {
        $sandwich->load('ingredients');
        return view('sandwiches.show', compact('sandwich'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sandwich $sandwich)
    {
        $sandwich->load('ingredients');
        return view('sandwiches.edit', compact('sandwich'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sandwich $sandwich)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients.*.id' => 'nullable|integer|exists:ingredients,id',
            'ingredients.*.name' => 'required_with:ingredients|string|max:255',
            'ingredients.*.quantity' => 'nullable|string|max:255',
        ]);

        $sandwich->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        $incoming = collect($request->input('ingredients', []));
        $keepIds = [];

        foreach ($incoming as $row) {
            if (empty($row['name'])) {
                continue;
            }
            if (!empty($row['id'])) {
                $sandwich->ingredients()->where('id', $row['id'])->update([
                    'name' => $row['name'],
                    'quantity' => $row['quantity'] ?? null,
                ]);
                $keepIds[] = (int) $row['id'];
            } else {
                $ingredient = $sandwich->ingredients()->create([
                    'name' => $row['name'],
                    'quantity' => $row['quantity'] ?? null,
                ]);
                $keepIds[] = $ingredient->id;
            }
        }

        // Delete removed ingredients
        $sandwich->ingredients()->whereNotIn('id', $keepIds)->delete();

        return redirect()->route('sandwiches.show', $sandwich)->with('success', 'Sandwich bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sandwich $sandwich)
    {
        $sandwich->delete();
        return redirect()->route('sandwiches.index')->with('success', 'Sandwich verwijderd.');
    }
}
