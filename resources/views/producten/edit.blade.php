@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Product bewerken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h1>Peters Foodstore</h1>
        <p>Product bewerken</p>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('producten.update', $product) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input type="text" name="naam" class="form-control" value="{{ old('naam', $product->naam) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Prijs:</label>
                <input type="text" name="prijs" class="form-control" value="{{ old('prijs', $product->prijs) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Omschrijving:</label>
                <textarea name="omschrijving" class="form-control">{{ old('omschrijving', $product->omschrijving) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Categorie:</label>
                <input type="text" name="categorie" class="form-control" value="{{ old('categorie', $product->categorie) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto:</label><br>
                @if ($product->foto)
                    <img src="{{ asset('storage/' . $product->foto) }}" alt="Product foto" width="150" class="mb-2"><br>
                @endif
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Bijwerken</button>
            <a href="{{ route('producten.index') }}" class="btn btn-secondary">⬅ Terug naar overzicht</a>
        </form>
    </div>
</body>
</html>
