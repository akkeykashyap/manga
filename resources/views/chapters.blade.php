<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Chapters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Manga App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Chapters</h1>

        @if (isset($chapters['data']) && !empty($chapters['data']))
            <ul class="list-group">
                @foreach ($chapters['data'] as $chapter)
                    <li class="list-group-item">
                        <a href="{{ $chapter['link'] }}" target="_blank">{{ $chapter['title'] }}</a>
                        <small class="text-muted">Released on: {{ $chapter['release_date'] }}</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No chapters found.</p>
        @endif
    </div>
</body>
</html>
