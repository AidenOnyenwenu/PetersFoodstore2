<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tafels Overzicht</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FEF3E2;
            color: #000;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
            background: #DD0303;
            color: white;
        }
        button, input[type=submit] {
            padding: 10px 15px;
            background: #DD0303;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover, input[type=submit]:hover {
            background: #a00202;
        }
        .form-inline {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .form-inline input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tafels in ons restaurant</h1>

    <!-- Succesmelding -->
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tafel toevoegen -->
    <form action="{{ route('tafels.store') }}" method="POST" class="form-inline">
        @csrf
        <input type="text" name="soort" placeholder="Soort tafel (bijv. 4-persoons)" required>
        <input type="number" name="aantal" placeholder="Aantal" required min="1">
        <input type="submit" value="Toevoegen">
    </form>

    <!-- Tafel overzicht -->
    <table>
        <tr>
            <th>ID</th>
            <th>Soort</th>
            <th>Aantal</th>
            <th>Aangemaakt op</th>
            <th>Acties</th>
        </tr>
        @foreach($tafels as $tafel)
            <tr>
                <td>{{ $tafel->id }}</td>
                <td>{{ $tafel->soort }}</td>
                <td>{{ $tafel->aantal }}</td>
                <td>{{ $tafel->created_at->format('d-m-Y H:i') }}</td>
                <td class="action-buttons">
                    <!-- Edit knop -->
                    <a href="{{ route('tafels.edit', $tafel) }}"><button type="button">Bewerk</button></a>

                    <!-- Delete knop -->
                    <form action="{{ route('tafels.destroy', $tafel) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tafel verwijderen?')">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>

