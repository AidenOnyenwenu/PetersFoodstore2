<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Medewerker bewerken</title>
</head>
<body>
    <h1>Medewerker bewerken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medewerkers.update', $medewerker->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Naam:</label><br>
        <input type="text" name="naam" value="{{ old('naam', $medewerker->naam) }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $medewerker->email) }}"><br><br>

        <label>Telefoonnummer:</label><br>
        <input type="text" name="telefoonnummer" value="{{ old('telefoonnummer', $medewerker->telefoonnummer) }}"><br><br>

        <label>Functie:</label><br>
        <input type="text" name="functie" value="{{ old('functie', $medewerker->functie) }}"><br><br>

        <button type="submit">Bijwerken</button>
    </form>

    <p><a href="{{ route('medewerkers.index') }}">⬅ Terug naar overzicht</a></p>
</body>
</html>
