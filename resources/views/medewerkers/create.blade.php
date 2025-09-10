<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Medewerker</title>
</head>
<body>
    <h1>Nieuwe medewerker toevoegen</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('medewerkers.store') }}" method="POST">
        @csrf
        <label>Naam:</label><br>
        <input type="text" name="naam" value="{{ old('naam') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Telefoonnummer:</label><br>
        <input type="text" name="telefoonnummer" value="{{ old('telefoonnummer') }}"><br><br>

        <label>Functie:</label><br>
        <input type="text" name="functie" value="{{ old('functie') }}"><br><br>

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="{{ route('medewerkers.index') }}">⬅ Terug naar overzicht</a></p>
</body>
</html>
