<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Admin Reserveringen</title>
    <style>
        body { font-family: Arial; background: #FEF3E2; color: #000; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ccc; text-align: left; }
        th { background: #DD0303; color: #fff; }
        button { padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer; }
        .edit { background: #28a745; color: #fff; }
        .delete { background: #dc3545; color: #fff; }
    </style>
</head>
<body>
<h1>Alle Reserveringen</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table>
    <tr>
        <th>Klant</th>
        <th>Email</th>
        <th>Telefoon</th>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Aantal</th>
        <th>Opmerkingen</th>
        <th>Acties</th>
    </tr>

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
            <a href="{{ route('admin.reserveringen.edit', $reservering) }}">
                <button class="edit">Bewerk</button>
            </a>
            <form action="{{ route('admin.reserveringen.destroy', $reservering) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="delete" onclick="return confirm('Weet je zeker dat je deze reservering wilt verwijderen?')">Verwijder</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>



