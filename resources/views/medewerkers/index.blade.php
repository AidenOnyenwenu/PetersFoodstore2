@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Medewerkers - Peters Foodstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/brands.css" />

</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1>Peters Foodstore</h1>
        <p>Overzicht van alle medewerkers van ons restaurant</p>
    </div>

    <div class="container">
        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Nieuwe medewerker knop -->
        <div class="mb-3 text-end">
            <form action="{{ route('medewerkers.create') }}" method="GET">
                <button type="submit"><i class="fa-regular fa-user-plus"></i> Nieuwe medewerker toevoegen</button>
            </form>
        </div>

        <!-- Medewerkers tabel -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Telefoonnummer</th>
                        <th>Functie</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medewerkers as $medewerker)
                        <tr>
                            <td>{{ $medewerker->naam }}</td>
                            <td>{{ $medewerker->email }}</td>
                            <td>{{ $medewerker->telefoonnummer }}</td>
                            <td>{{ $medewerker->functie }}</td>
                            <td class="table-actions">
                                <form action="{{ route('medewerkers.edit', $medewerker->id) }}" method="GET"
                                    style="display:inline-block;">
                                    <button type="submit"><i class="fa-regular fa-pencil"></i> Bewerken</button>
                                </form>
                                <form action="{{ route('medewerkers.destroy', $medewerker->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Weet je zeker dat je deze medewerker wilt verwijderen?')"><i class="fa-regular fa-trash-xmark"></i> Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($medewerkers->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Geen medewerkers gevonden</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS (optioneel) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>