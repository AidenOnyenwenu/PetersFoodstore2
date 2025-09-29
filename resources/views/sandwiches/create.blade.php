@extends('layouts.app')

@section('content')
<div class="card" style="padding:1.25rem">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1rem">
        <h1 style="font-size:1.25rem;font-weight:600">Nieuwe sandwich</h1>
        <a href="{{ route('sandwiches.index') }}" class="btn btn-secondary">Terug</a>
    </div>
    <form action="{{ route('sandwiches.store') }}" method="POST" style="display:grid;gap:1rem">
        @csrf
        <div class="card" style="padding:1rem">
            <label style="display:block;margin-bottom:.25rem;font-weight:500">Naam</label>
            <input name="name" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;width:100%" value="{{ old('name') }}">
            @error('name')<div style="color:#dc2626;margin-top:.25rem">{{ $message }}</div>@enderror
        </div>
        <div class="card" style="padding:1rem">
            <label style="display:block;margin-bottom:.25rem;font-weight:500">Omschrijving</label>
            <textarea name="description" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;width:100%" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="card" style="padding:1rem">
            <label style="display:block;margin-bottom:.5rem;font-weight:500">Ingrediënten</label>
            <div id="ingredients" style="display:grid;gap:.5rem">
                <div style="display:flex;gap:.5rem;flex-wrap:wrap">
                    <input name="ingredients[0][name]" placeholder="Naam" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;flex:1 1 240px">
                    <input name="ingredients[0][quantity]" placeholder="Hoeveelheid" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;flex:1 1 240px">
                </div>
            </div>
            <button type="button" id="addRow" class="btn btn-secondary" style="margin-top:.5rem">+ Rij</button>
        </div>

        <div style="display:flex;gap:.5rem;flex-wrap:wrap">
            <button class="btn btn-primary">Opslaan</button>
            <a href="{{ route('sandwiches.index') }}" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>

<script>
let row = 1;
document.getElementById('addRow').addEventListener('click', () => {
    const wrap = document.getElementById('ingredients');
    const div = document.createElement('div');
    div.style.display = 'flex';
    div.style.gap = '.5rem';
    div.style.flexWrap = 'wrap';
    div.innerHTML = `<input name="ingredients[${row}][name]" placeholder="Naam" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;flex:1 1 240px">`+
                    `<input name="ingredients[${row}][quantity]" placeholder="Hoeveelheid" style="border:1px solid #e5e7eb;border-radius:.5rem;padding:.625rem;flex:1 1 240px">`;
    wrap.appendChild(div);
    row++;
});
</script>

@endsection
