<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Dranken - Peters Foodstore</title>
    <style>
        body.dranken-body, html.dranken-body {
            margin: 0;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            background-color: #f5f5f5;
        }

        .dranken-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }

        .dranken-card {
            background: linear-gradient(145deg, #fff6f6, #ffeaea);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .dranken-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .dranken-image-container {
            width: 100%;
            height: 180px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff0f0;
        }

        .dranken-image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .dranken-card:hover .dranken-image-container img {
            transform: scale(1.05);
        }

        .dranken-info {
            padding: 15px 20px;
            text-align: center;
            flex-grow: 1;
            position: relative;
        }

        .dranken-name {
            font-size: 1.2rem;
            font-weight: bold;
            color: #b62323;
            margin-bottom: 5px;
        }

        .dranken-price {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
        }

        .dranken-description {
            font-size: 0.95rem;
            color: #555;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .dranken-card:hover .dranken-description {
            max-height: 200px;
            opacity: 1;
        }

        .dranken-actions {
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            border-top: 1px solid #e0e0e0;
            background-color: #fff6f6;
        }

        .dranken-btn {
            padding: 8px 15px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.2s;
        }

        .dranken-btn-edit {
            background-color: #007bff;
            color: white;
        }

        .dranken-btn-edit:hover {
            background-color: #0056b3;
        }

        .dranken-btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .dranken-btn-delete:hover {
            background-color: #a71d2a;
        }

        .dranken-new-btn {
            display: block;
            text-align: center;
            margin: 30px auto;
            padding: 12px 25px;
            background: #b62323;
            color: white;
            font-size: 1rem;
            border-radius: 10px;
            text-decoration: none;
            width: fit-content;
            transition: all 0.3s;
        }

        .dranken-new-btn:hover { background: #e8423c; }
    </style>
</head>
<body class="dranken-body">
    @include('partials.navigation')
    @include('partials.header', [
        'title' => 'Dranken',
        'subtitle' => 'Bekijk onze heerlijke dranken',
        'image' => 'https://picsum.photos/1200/400?blur'
    ])

    <div class="dranken-container">
        @forelse ($dranken as $drank)
            <div class="dranken-card">
                <div class="dranken-image-container">
                    @if($drank->afbeelding)
                        <img src="{{ asset('storage/' . $drank->afbeelding) }}" alt="{{ $drank->naam }}">
                    @else
                        <img src="https://picsum.photos/400/300?random={{ $drank->id }}" alt="{{ $drank->naam }}">
                    @endif
                </div>
                <div class="dranken-info">
                    <div class="dranken-name">{{ $drank->naam }}</div>
                    <div class="dranken-price">€{{ number_format($drank->prijs, 2) }}</div>
                    <div class="dranken-description">{{ $drank->omschrijving }}</div>
                </div>
                <div class="dranken-actions">
                    <a href="{{ route('dranken.edit', $drank) }}" class="dranken-btn dranken-btn-edit">Bewerken</a>
                    <form action="{{ route('dranken.destroy', $drank) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze drank wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dranken-btn dranken-btn-delete">Verwijderen</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="width:100%; text-align:center; color:#555;">Geen dranken gevonden</p>
        @endforelse
    </div>

    <a href="{{ route('dranken.create') }}" class="dranken-new-btn">Nieuwe drank toevoegen</a>
    @include('partials.footer')
</body>
</html>
