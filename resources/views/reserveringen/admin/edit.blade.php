<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reservering Bewerken</title>
    <style>
        body { font-family: Arial; background-color: #FEF3E2; color: #000; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; }
        h1 { text-align: center; color: #DD0303; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; font-weight: bold; }
        input, textarea { padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { margin-top: 20px; padding: 12px; border-radius: 5px; border: none; background: #DD0303; color: #fff; cursor: pointer; }
        button:hover { background: #a00202; }
        .error { color: #dc3545; font-size: 0.9em; }
    </style>
</head>
<body>
<div class="container">
    <h1>Bewerk Reservering</h1>

    <form action="{{ route('reserveringen.admin.update', $reservering) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Naam:</label>
        <input type="text" name="klant_naam" value="{{ $reservering->klant_naam }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $reservering->email }}" required>

        <label>Telefoonnummer:</label>
        <input type="text" name="telefoonnummer" value="{{ $reservering->telefoonnummer }}">

        <label>Datum:</label>
        <input type="date" name="datum" value="{{ $reservering->datum }}" required>

        <label>Tijd:</label>
        <input type="time" name="tijd" value="{{ $reservering->tijd }}" required>

        <label>Aantal personen:</label>
        <input type="number" name="aantal_personen" min="1" value="{{ $reservering->aantal_personen }}" required>

        <label>Opmerkingen:</label>
        <textarea name="opmerkingen">{{ $reservering->opmerkingen }}</textarea>

        <button type="submit">Opslaan</button>
    </form>
</div>
</body>
</html>
