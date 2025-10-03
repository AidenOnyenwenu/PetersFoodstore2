<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tafel Bewerken</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FEF3E2;
            color: #000;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #DD0303;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type=text], input[type=number] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #DD0303;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #a00202;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tafel Bewerken</h1>

    <form action="{{ route('tafels.update', $tafel) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Soort tafel:</label>
        <input type="text" name="soort" value="{{ $tafel->soort }}" required>

        <label>Aantal:</label>
        <input type="number" name="aantal" value="{{ $tafel->aantal }}" min="1" required>

        <button type="submit">Opslaan</button>
    </form>
</div>
</body>
</html>
