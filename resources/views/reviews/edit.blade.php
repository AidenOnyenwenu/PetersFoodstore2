<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Review bewerken</title>
    <style>
        body.reviews-form-body, html.reviews-form-body {
            margin: 0;
            padding: 0;
            font-family: "DM Sans", sans-serif;
            background-color: #f5f5f5;
        }

        .reviews-form-header {
            padding: 60px 20px;
            background-color: #8d4949a3;
            color: white;
            text-align: center;
        }

        .reviews-form-container {
            max-width: 600px;
            margin: 50px auto 50px auto;
            padding: 20px;
        }

        form.reviews-form {
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

        textarea {
            resize: vertical;
        }

        .reviews-btn-submit {
            background-image: linear-gradient(to right, #b62323, #e8423c, #e8423c, #b62323);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .reviews-btn-submit:hover {
            background-position: 100% 0;
        }

        .reviews-btn-back {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #6c757d;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }

        .reviews-alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 15px;
        }

        .reviews-error {
            color: #DD0303;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body class="reviews-form-body">
    @include('partials.navigation')
    @include('partials.header', [
        'title' => 'Review bewerken',
        'subtitle' => 'Pas hier je review aan',
        'image' => 'https://picsum.photos/1200/400?blur'
    ])

    <div class="reviews-form-container">
        @if ($errors->any())
            <div class="reviews-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.update', $review) }}" method="POST" class="reviews-form">
            @csrf
            @method('PUT')
            <div>
                <label>Klantnaam:</label>
                <input type="text" name="klantnaam" value="{{ old('klantnaam', $review->klantnaam) }}" required>
                @error('klantnaam')<div class="reviews-error">{{ $message }}</div>@enderror
            </div>

            <div>
                <label>Beoordeling (1-5):</label>
                <select name="beoordeling" required>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('beoordeling', $review->beoordeling) == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                @error('beoordeling')<div class="reviews-error">{{ $message }}</div>@enderror
            </div>

            <div>
                <label>Opmerking:</label>
                <textarea name="opmerking" rows="3" required>{{ old('opmerking', $review->opmerking) }}</textarea>
                @error('opmerking')<div class="reviews-error">{{ $message }}</div>@enderror
            </div>

            <button type="submit" class="reviews-btn-submit">Bijwerken</button>
            <a href="{{ route('reviews.index') }}" class="reviews-btn-back">⬅ Terug naar overzicht</a>
        </form>
    </div>

    @include('partials.footer')
</body>
</html>
