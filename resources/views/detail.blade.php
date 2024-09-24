<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mangaDetail['title'] }} - Manga Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('manga_manga') }}">Manga App</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>{{ $mangaDetail['title'] }}</h1>
        <a href="{{ route('manga.chapters', ['id' => $mangaDetail['id']]) }}">
            <img src="{{ $mangaDetail['thumb'] }}" class="img-fluid" alt="{{ $mangaDetail['title'] }}">
        </a>
        <p class="mt-3">{{ $mangaDetail['summary'] }}</p>
        <p><strong>Genres:</strong> {{ implode(', ', $mangaDetail['genres']) }}</p>
        <p><strong>Status:</strong> {{ $mangaDetail['status'] }}</p>
        <a href="#" class="btn btn-primary">Read Online</a>
        <a href="{{ route('manga.chapters', ['id' => $mangaDetail['id']]) }}" class="btn btn-secondary">View Chapters</a>

    </div>
</body>
</html>
