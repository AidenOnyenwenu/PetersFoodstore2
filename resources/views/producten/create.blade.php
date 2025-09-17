<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Product</title>
</head>
<body>
    <h1>Nieuw product toevoegen</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('producten.store') }}" method="POST">
        @csrf
        <label>Naam:</label><br>
        <input type="text" name="naam" value="{{ old('naam') }}"><br><br>

        <label>Prijs:</label><br>
        <input type="text" name="prijs" value="{{ old('prijs') }}"><br><br>

        <label>Omschrijving:</label><br>
        <textarea name="omschrijving">{{ old('omschrijving') }}</textarea><br><br>

        <label>Categorie:</label><br>
        <input type="text" name="categorie" value="{{ old('categorie') }}"><br><br>

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="{{ route('producten.index') }}">⬅ Terug naar overzicht</a></p>
</body>
</html>
