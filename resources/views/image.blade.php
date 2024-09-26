<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Chapter Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .chapter-image {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Manga App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Chapter Images</h1>

        @if (isset($chapters['data']) && !empty($chapters['data']))
            <div class="row">
                @foreach ($chapters['data'] as $chapter)
                    <div class="col-md-6 chapter-image">
                        <h5>{{ trim($chapter['chapter']) }}</h5>
                        <img src="{{ $chapter['link'] }}" alt="Image for {{ $chapter['chapter'] }}" class="img-fluid" onerror="this.onerror=null; this.src='path/to/fallback-image.jpg';">
                    </div>
                @endforeach
            </div>
        @else
            <p>No images found for this chapter.</p>
        @endif
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">© 2024 Manga App. All rights reserved.</span>
        </div>
    </footer>
</body>
</html>
