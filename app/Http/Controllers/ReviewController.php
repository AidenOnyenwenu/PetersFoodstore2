<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'klantnaam' => 'required|string|max:255',
            'beoordeling' => 'required|integer|min:1|max:5',
            'opmerking' => 'nullable|string',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review toegevoegd!');
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'klantnaam' => 'required|string|max:255',
            'beoordeling' => 'required|integer|min:1|max:5',
            'opmerking' => 'nullable|string',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review bijgewerkt!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review verwijderd!');
    }
}
