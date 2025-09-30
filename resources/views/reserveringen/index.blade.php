<!-- resources/views/reserveringen/index.blade.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Reservering</title>
    <style>
<<<<<<< HEAD
=======
        body {
            font-family: Arial, sans-serif;
            background-color: #FEF3E2; /* Lichte achtergrond */
            color: #000; /* Alle tekst zwart */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
>>>>>>> d794b4b29d1129fe6ed2150cb7b35c835a2a886a
        h1, h2 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc; /* neutraal grijs */
            box-sizing: border-box;
            color: #000; /* tekst zwart */
        }
        textarea {
            resize: vertical;
        }
        button:hover {
            background-color: #a00202; /* donkerder rood bij hover */
        }
        .alert {
            background-color: #f8d7da; /* lichte rood tint voor melding */
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .error {
            color: #DD0303; /* rode error */
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
        <!-- Navbar -->
    @include('partials.navigation')
     @include('partials.header', [
        'title' => 'Reserveren',
        'subtitle' => '
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam maximus augue leo, ac fermentum dolor bibendum tristique. Sed sed nibh.',
        'image' => 'https://lh3.googleusercontent.com/gps-cs-s/AC9h4no4YEl0bpio3Dz3LnHTURqI5KoO5GFePI-OtTe3AtESeT-DCkGZDcnj7yyd0Iv5rLJEhqhFf78Z9HSUTjONnH3cXpBNFFnXkfzFxR0bhH6pmqX8cCcqYfkWikgKJt_torX1Z8ai=s1360-w1360-h1020-rw' // pad vanuit public/
    ])
    <div class="bg-color-standard content-section">
    <div class="container ">
        <h1>Maak een Reservering</h1>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('reserveringen.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="klant_naam">Naam:</label>
                <input type="text" id="klant_naam" name="klant_naam" value="{{ old('klant_naam') }}" required>
                @error('klant_naam')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="telefoonnummer">Telefoonnummer:</label>
                <input type="text" id="telefoonnummer" name="telefoonnummer" value="{{ old('telefoonnummer') }}">
                @error('telefoonnummer')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="datum">Datum:</label>
                <input type="date" id="datum" name="datum" value="{{ old('datum') }}" required>
                @error('datum')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="tijd">Tijd:</label>
                <input type="time" id="tijd" name="tijd" value="{{ old('tijd') }}" required>
                @error('tijd')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="aantal_personen">Aantal personen:</label>
                <input type="number" id="aantal_personen" name="aantal_personen" min="1" value="{{ old('aantal_personen') }}" required>
                @error('aantal_personen')<div class="error">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="opmerkingen">Opmerkingen:</label>
                <textarea id="opmerkingen" name="opmerkingen" rows="3">{{ old('opmerkingen') }}</textarea>
            </div>

            <button type="submit">Reservering Versturen</button>
        </form>
    </div>
    </div>
     @include('partials.footer')
</body>
</html>
