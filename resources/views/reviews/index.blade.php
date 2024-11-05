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
                    <h2 class='title'>{{ $review->title }}</h2>
                    <h2 class='body'>{{ $review->body }}</h2>
                    <h2 class='event_title'>{{ $review->event_title }}</h2>
                    <h2 class='event_body'>{{ $review->event_body }}</h2>
                </div>
            @endforeach
        </div>
    </body>
</html>