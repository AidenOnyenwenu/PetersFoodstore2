<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        ]);

        Product::create($request->all());
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
        ]);

        $product->update($request->all());
        return redirect()->route('producten.index')->with('success', 'Product bijgewerkt!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('producten.index')->with('success', 'Product verwijderd!');
    }
}
