<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{ 
    public function index()
    {
        $producten = Product::all();
        return view('producten.index', compact('producten'));
    }

    public function create()
    {
        return view('producten.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'naam' => 'required',
        'prijs' => 'required|numeric',
        'omschrijving' => 'nullable',
        'categorie' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        $pad = $request->file('foto')->store('producten', 'public');
        $data['foto'] = $pad;
    }

    Product::create($data);

    return redirect()->route('producten.index')->with('success', 'Product toegevoegd!');
}


    public function edit(Product $product)
    {
        return view('producten.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    $request->validate([
        'naam' => 'required',
        'prijs' => 'required|numeric',
        'omschrijving' => 'nullable',
        'categorie' => 'required',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('foto')) {
        // Oude foto verwijderen als die bestaat
        if ($product->foto && Storage::disk('public')->exists($product->foto)) {
            Storage::disk('public')->delete($product->foto);
        }

        // Nieuwe foto opslaan
        $pad = $request->file('foto')->store('producten', 'public');
        $data['foto'] = $pad;
    }

    $product->update($data);

    return redirect()->route('producten.index')->with('success', 'Product bijgewerkt!');
}



    public function destroy(Product $product)
{
    // Foto verwijderen als die bestaat
    if ($product->foto && Storage::disk('public')->exists($product->foto)) {
        Storage::disk('public')->delete($product->foto);
    }

    $product->delete();

    return redirect()->route('producten.index')->with('success', 'Product verwijderd!');
}

}
