<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Drank bewerken</title>
    <style>
        body.dranken-form-body, html.dranken-form-body {
            margin: 0;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            background-color: #f5f5f5;
        }

        .dranken-form-header {
            padding: 60px 20px;
            background-color: #8d4949a3;
            color: white;
            text-align: center;
        }

        .dranken-form-container {
            max-width: 600px;
            margin: 50px auto 50px auto;
            padding: 20px;
        }

        form.dranken-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
        }

        input, textarea, select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        textarea { resize: vertical; }

        .dranken-btn-submit {
            background-image: linear-gradient(to right, #b62323, #e8423c, #e8423c, #b62323);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .dranken-btn-submit:hover { background-position: 100% 0; }

        .dranken-btn-back {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #6c757d;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }

        .dranken-alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }

        .dranken-error {
            color: #DD0303;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body class="dranken-form-body">
    @include('partials.navigation')
    @include('partials.header', [
        'title' => 'Drank bewerken',
        'subtitle' => 'Pas hier de gegevens van het drankje aan',
        'image' => 'https://picsum.photos/1200/400?blur'
    ])

    <div class="dranken-form-container">
        @if ($errors->any())
            <div class="dranken-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dranken.update', $drank) }}" method="POST" enctype="multipart/form-data" class="dranken-form">
            @csrf
            @method('PUT')

            <div>
                <label>Naam:</label>
                <input type="text" name="naam" value="{{ old('naam', $drank->naam) }}" required>
                @error('naam')<div class="dranken-error">{{ $message }}</div>@enderror
            </div>

            <div>
                <label>Prijs (€):</label>
                <input type="number" step="0.01" name="prijs" value="{{ old('prijs', $drank->prijs) }}" required>
                @error('prijs')<div class="dranken-error">{{ $message }}</div>@enderror
            </div>

            <div>
                <label>Omschrijving:</label>
                <textarea name="omschrijving" rows="3">{{ old('omschrijving', $drank->omschrijving) }}</textarea>
                @error('omschrijving')<div class="dranken-error">{{ $message }}</div>@enderror
            </div>

            <div>
                <label>Afbeelding:</label>
                <input type="file" name="afbeelding" accept="image/*">
                @if($drank->afbeelding)
                    <p>Huidige afbeelding: <img src="{{ asset('storage/' . $drank->afbeelding) }}" alt="{{ $drank->naam }}" style="height:50px; border-radius:5px;"></p>
                @endif
                @error('afbeelding')<div class="dranken-error">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="dranken-btn-submit">Bijwerken</button>
            <a href="{{ route('dranken.index') }}" class="dranken-btn-back">⬅ Terug naar overzicht</a>
        </form>
    </div>

    @include('partials.footer')
</body>
</html>
