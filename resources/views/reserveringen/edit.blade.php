<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reservering Bewerken</title>
    <style>
        body { font-family: Arial; background: #FEF3E2; color: #000; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; }
        input, textarea, button { width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #DD0303; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #a00202; }
    </style>
</head>
<body>
<div class="container">
<h1>Reservering Bewerken</h1>

<form action="{{ route('admin.reserveringen.update', $reservering) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="klant_naam" value="{{ $reservering->klant_naam }}" required>
    <input type="email" name="email" value="{{ $reservering->email }}" required>
    <input type="text" name="telefoonnummer" value="{{ $reservering->telefoonnummer }}">
    <input type="date" name="datum" value="{{ $reservering->datum }}" required>
    <input type="time" name="tijd" value="{{ $reservering->tijd }}" required>
    <input type="number" name="aantal_personen" value="{{ $reservering->aantal_personen }}" min="1" required>
    <textarea name="opmerkingen">{{ $reservering->opmerkingen }}</textarea>

    <button type="submit">Bijwerken</button>
</form>
</div>
</body>
</html>
