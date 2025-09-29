@extends('layouts.app')

@section('content')
<div class="card" style="padding:1.25rem">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1rem">
        <h1 style="font-size:1.25rem;font-weight:600">Sandwiches</h1>
        <a href="{{ route('sandwiches.create') }}" class="btn btn-primary">Nieuwe sandwich</a>
    </div>

    @if (session('success'))
        <div style="margin-bottom:1rem" class="card"><div style="padding:.75rem 1rem">{{ session('success') }}</div></div>
    @endif

    <div style="overflow:auto;border:1px solid #e5e7eb;border-radius:.5rem">
        <table style="width:100%;border-collapse:collapse">
            <thead style="background:#f9fafb">
                <tr>
                    <th style="text-align:left;padding:.75rem 1rem">Naam</th>
                    <th style="text-align:left;padding:.75rem 1rem">Ingrediënten</th>
                    <th style="text-align:left;padding:.75rem 1rem;width:220px">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sandwiches as $sandwich)
                    <tr style="border-top:1px solid #e5e7eb">
                        <td style="padding:.75rem 1rem">{{ $sandwich->name }}</td>
                        <td style="padding:.75rem 1rem">{{ $sandwich->ingredients_count }}</td>
                        <td style="padding:.75rem 1rem">
                            <div style="display:flex;gap:.5rem;flex-wrap:wrap">
                                <a class="btn btn-secondary" href="{{ route('sandwiches.show', $sandwich) }}">Bekijken</a>
                                <a class="btn btn-secondary" href="{{ route('sandwiches.edit', $sandwich) }}">Bewerken</a>
                                <form action="{{ route('sandwiches.destroy', $sandwich) }}" method="POST" onsubmit="return confirm('Verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td style="padding:.75rem 1rem" colspan="3">Geen sandwiches</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection


