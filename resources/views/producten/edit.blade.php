<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Product bewerken</title>
</head>

<body>
    <h1>Product bewerken</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('producten.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Naam:</label><br>
        <input type="text" name="naam" value="{{ old('naam', $product->naam) }}"><br><br>

        <label>Prijs:</label><br>
        <input type="text" name="prijs" value="{{ old('prijs', $product->prijs) }}"><br><br>

        <label>Omschrijving:</label><br>
        <textarea name="omschrijving">{{ old('omschrijving', $product->omschrijving) }}</textarea><br><br>

        <label>Categorie:</label><br>
        <input type="text" name="categorie" value="{{ old('categorie', $product->categorie) }}"><br><br>

        <label>Foto:</label><br>
        @if ($product->foto)
            <img src="{{ asset('storage/' . $product->foto) }}" alt="Product foto" width="150"><br>
        @endif
        <input type="file" name="foto"><br><br>

        <button type="submit">Bijwerken</button>
    </form>

    <p><a href="{{ route('producten.index') }}">⬅ Terug naar overzicht</a></p>
</body>

</html>
