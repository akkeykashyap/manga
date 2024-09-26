<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-bottom: 60px;
            background-image: url('public/apple-isolated-on-wood-background.webp');
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 60px;
            background-color: #f5f5f5;
        }

        p.card-text {
            margin-top: -10px;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Manga App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">MangaXYZ</h1>
        <div class="input-group mb-3">
            <form action="{{ route('manga_manga') }}" method="post" class="form-inline">
                @csrf
                <div class="d-flex">
                    <div class="form-group">
                        <input type="text" name="manga" id="manga" style="height: 50px" class="form-control"
                            placeholder="enter manga title" required>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        @if (isset($mangaResponse) && !empty($mangaResponse['data']))
        <div class="row">
            @foreach ($mangaResponse['data'] as $manga)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ $manga['thumb'] }}" class="card-img-top" alt="{{ $manga['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $manga['title'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $manga['sub_title'] }}</h6>
                            <p class="card-text">{{ $manga['summary'] }}</p>
                            <p class="card-text">{{ implode(', ', $manga['genres']) }}</p>
                            <p class="card-text"><small class="text-muted">Status: {{ $manga['status'] }}</small></p>
                            <p class="card-text"><small class="text-muted">Authors: {{ implode(', ', $manga['authors']) }}</small></p>
                            <p class="card-text"><small class="text-muted">Total Chapters: {{ $manga['total_chapter'] }}</small></p>
                            <a href="{{ route('manga.chapters', ['id' => $manga['id']]) }}">
                                <button class="btn btn-primary">Read</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @elseif(isset($mangaResponse))
            <p>No manga found.</p>
        @endif


        @if (isset($chapters) && !empty($chapters['data']))
            <h2 class="mt-5">Chapters</h2>
            <ul class="list-group">
                @foreach ($chapters['data'] as $chapter)
                    <li class="list-group-item">
                        <a href="{{ $chapter['title'] }}" target="_blank">{{ $chapter['title'] }}</a>
                        <small class="text-muted">Released on: {{ $chapter['release_date'] }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
