<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Reviews - Peters Foodstore</title>
    <style>
        body.reviews-body, html.reviews-body {
            margin: 0;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            background-color: #f5f5f5;
        }

        .reviews-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap; /* zodat reviews meerdere rijen kunnen maken */
            gap: 20px;
            justify-content: space-between;
        }

        .reviews-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 25px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 1 1 calc(25% - 20px); /* 4 reviews per rij, minus gap */
            min-width: 250px; /* kleine breedte voor mobiel */
            transition: transform 0.2s;
        }

        .reviews-card:hover {
            transform: translateY(-5px);
        }

        .reviews-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .reviews-header h3 {
            margin: 0;
            font-size: 1.2rem;
            color: #b62323;
        }

        .reviews-stars {
            color: #ffc107;
            font-weight: bold;
        }

        .reviews-body {
            font-size: 0.95rem;
            color: #333;
            margin-bottom: 15px;
        }

        .reviews-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .reviews-btn {
            padding: 8px 12px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            transition: all 0.2s;
            text-decoration: none; /* verwijdert underline van link */
        }

        .reviews-btn-edit {
            background-color: #007bff;
            color: white;
        }

        .reviews-btn-edit:hover {
            background-color: #0056b3;
        }

        .reviews-btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .reviews-btn-delete:hover {
            background-color: #a71d2a;
        }

        .reviews-new-btn {
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

        .reviews-new-btn:hover {
            background: #e8423c;
        }

        @media (max-width: 1024px) {
            .reviews-card {
                flex: 1 1 calc(50% - 20px); /* 2 per rij */
            }
        }

        @media (max-width: 600px) {
            .reviews-card {
                flex: 1 1 100%; /* 1 per rij */
            }
        }
    </style>
</head>
<body class="reviews-body">
    @include('partials.navigation')
    @include('partials.header', [
        'title' => 'Reviews',
        'subtitle' => 'Lees ervaringen van anderen of laat zelf een review achter',
        'image' => 'https://picsum.photos/1200/400?blur'
    ])

    <div class="reviews-container">
        @forelse ($reviews as $review)
            <div class="reviews-card">
                <div class="reviews-header">
                    <h3>{{ $review->klantnaam }}</h3>
                    <span class="reviews-stars">{{ str_repeat('⭐', $review->beoordeling) }}</span>
                </div>
                <div class="reviews-body">
                    {{ $review->opmerking }}
                </div>
                <div class="reviews-actions">
                    <a href="{{ route('reviews.edit', $review) }}" class="reviews-btn reviews-btn-edit">Bewerken</a>
                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze review wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="reviews-btn reviews-btn-delete">Verwijderen</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="width:100%; text-align:center; color:#555;">Geen reviews gevonden</p>
        @endforelse
    </div>

    <a href="{{ route('reviews.create') }}" class="reviews-new-btn">Nieuwe review toevoegen</a>

    @include('partials.footer')
</body>
</html>
