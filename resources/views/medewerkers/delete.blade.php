<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Medewerker verwijderen</title>
</head>
<body>
    <h1>Weet je zeker dat je deze medewerker wilt verwijderen?</h1>

    <p><strong>Naam:</strong> {{ $medewerker->naam }}</p>
    <p><strong>Email:</strong> {{ $medewerker->email }}</p>
    <p><strong>Functie:</strong> {{ $medewerker->functie }}</p>

    <form action="{{ route('medewerkers.destroy', $medewerker->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Ja, verwijderen</button>
    </form>

    <p><a href="{{ route('medewerkers.index') }}">⬅ Annuleren</a></p>
</body>
</html>
