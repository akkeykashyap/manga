<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Chapters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="">
        <div class="container">
            <a class="navbar-brand" href="#">Manga App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Manga Chapters</h1>
        @if (isset($chapters['data']) && !empty($chapters['data']))
        <h2 class="mt-5">Chapters</h2>
        <ul class="list-group">
            @foreach ($chapters['data'] as $chapter)
                <li class="list-group-item">
                    <button class="btn btn-primary chapter-button" data-id="{{ $chapter['id'] }}">{{ trim($chapter['title']) }}</button>
                    <div class="chapter-details" id="details-{{ $chapter['id'] }}">
                        <p>ID: {{ $chapter['id'] }}</p>
                        <p>More details about {{ trim($chapter['title']) }}...</p>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No chapters found.</p>
    @endif
</div>

    <script>
        document.querySelectorAll('.chapter-button').forEach(button => {
            button.addEventListener('click', function() {
                const details = document.getElementById(`details-${this.dataset.id}`);
                if (details.style.display === "none" || details.style.display === "") {
                    details.style.display = "block";
                } else {
                    details.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
