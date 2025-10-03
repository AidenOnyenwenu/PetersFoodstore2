<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Beheer Reserveringen</title>
    <style>
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
            text-align: center;
            color: #DD0303;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
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
<div class="container">
    <h1>Beheer Reserveringen</h1>

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
</body>
</html>



