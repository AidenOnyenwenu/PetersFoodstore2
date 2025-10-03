<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Beheer Reserveringen</title>
    <style>
<<<<<<< HEAD
        body {
            font-family: Arial, sans-serif;
            background-color: #FEF3E2;
            margin: 0;
            padding: 20px;
            color: #000;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
=======
        h1, h2 {
>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543
            text-align: center;
            color: #DD0303;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
<<<<<<< HEAD
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #DD0303;
            color: #fff;
        }
        button, input[type=submit] {
            padding: 8px 12px;
            background: #DD0303;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }
        button:hover, input[type=submit]:hover {
            background-color: #a00202;
=======
        textarea {
            resize: vertical;
        }
        button:hover {
            background-color: #a00202; /* donkerder rood bij hover */
>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<<<<<<< HEAD
<div class="container">
    <h1>Beheer Reserveringen</h1>
=======
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
>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543

    <!-- Success message -->
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Telefoon</th>
                <th>Datum</th>
                <th>Tijd</th>
                <th>Aantal</th>
                <th>Opmerkingen</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reserveringen as $reservering)
            <tr>
                <td>{{ $reservering->klant_naam }}</td>
                <td>{{ $reservering->email }}</td>
                <td>{{ $reservering->telefoonnummer }}</td>
                <td>{{ $reservering->datum }}</td>
                <td>{{ $reservering->tijd }}</td>
                <td>{{ $reservering->aantal_personen }}</td>
                <td>{{ $reservering->opmerkingen }}</td>
                <td>
                    <!-- Bewerk knop -->
                    <a href="{{ route('admin.reserveringen.edit', $reservering) }}"><button>Bewerk</button></a>

<<<<<<< HEAD
                    <!-- Verwijder knop -->
                    <form action="{{ route('admin.reserveringen.destroy', $reservering) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je zeker dat je deze reservering wilt verwijderen?')">Verwijder</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
=======
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
>>>>>>> 60687ab442bc0ba6dd3e35b795ed98536e221543
</body>
</html>



