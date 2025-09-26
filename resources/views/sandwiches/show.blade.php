@extends('layouts.app')

@section('content')
<div class="card" style="padding:1.25rem">
    @if (session('success'))
        <div class="card" style="padding:.75rem 1rem;margin-bottom:1rem">{{ session('success') }}</div>
    @endif
    <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;flex-wrap:wrap">
        <div style="flex:1 1 320px">
            <h1 style="font-size:1.5rem;font-weight:700;margin:0 0 .5rem 0">{{ $sandwich->name }}</h1>
            <p style="opacity:.8;margin:0 0 1rem 0">{{ $sandwich->description }}</p>

            <h2 style="font-weight:600;margin-bottom:.5rem">Ingrediënten</h2>
            <ul style="padding-left:1rem;list-style:disc">
                @forelse ($sandwich->ingredients as $ingredient)
                    <li>{{ $ingredient->name }} @if($ingredient->quantity) ({{ $ingredient->quantity }}) @endif</li>
                @empty
                    <li>Geen ingrediënten</li>
                @endforelse
            </ul>
        </div>
        <div style="display:flex;gap:.5rem;height:fit-content">
            <a href="{{ route('sandwiches.edit', $sandwich) }}" class="btn btn-primary">Bewerken</a>
            <a href="{{ route('sandwiches.index') }}" class="btn btn-secondary">Terug</a>
        </div>
    </div>
</div>
@endsection


