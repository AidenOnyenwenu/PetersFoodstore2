@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Producten - Peters Foodstore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h1>Peters Foodstore</h1>
        <p>Overzicht van alle producten</p>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3 text-end">
            <form action="{{ route('producten.create') }}" method="GET">
                <button type="submit">Nieuw product toevoegen</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Naam</th>
                        <th>Prijs</th>
                        <th>Omschrijving</th>
                        <th>Categorie</th>
                        <th>Foto</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($producten as $product)
                        <tr>
                            <td>{{ $product->naam }}</td>
                            <td>€{{ number_format($product->prijs, 2, ',', '.') }}</td>
                            <td>{{ $product->omschrijving }}</td>
                            <td>{{ $product->categorie }}</td>
                            <td>
                                @if ($product->foto)
                                    <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto" width="80">
                                @else
                                    Geen foto
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('producten.edit', $product) }}"
                                    class="btn btn-sm btn-primary">Bewerken</a>

                                <form action="{{ route('producten.destroy', $product) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($producten->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Geen producten gevonden</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
