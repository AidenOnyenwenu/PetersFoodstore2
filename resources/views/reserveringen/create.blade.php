<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Reservering</title>
    <style>
        body { font-family: Arial; background: #FEF3E2; color: #000; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; }
        input, textarea, button { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { background: #DD0303; color: white; border: none; cursor: pointer; }
        button:hover { background: #a00202; }
        .alert { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Maak een Reservering</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reserveringen.store') }}" method="POST">
        @csrf
        <input type="text" name="klant_naam" placeholder="Naam" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telefoonnummer" placeholder="Telefoonnummer">
        <input type="date" name="datum" required>
        <input type="time" name="tijd" required>
        <input type="number" name="aantal_personen" placeholder="Aantal Personen" min="1" required>
        <textarea name="opmerkingen" placeholder="Opmerkingen"></textarea>
        <button type="submit">Reservering Versturen</button>
    </form>
</div>
</body>
</html>
