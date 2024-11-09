<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Review</h1>
        <div class='review'>
            @foreach($reviews as $review)
                <div class='review'>
                    <h2 class='title'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                    </h2>
                    <h2 class='body'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->body }}</a>
                    </h2>
                    <h2 class='event_title'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->event_title }}</a>
                    </h2>
                    <h2 class='event_body'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->event_body }}</a>
                    </h2>
                </div>
            @endforeach
        </div>
    </body>
</html>