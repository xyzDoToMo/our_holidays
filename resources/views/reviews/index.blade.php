<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <a href='/reviews/create'>create</a>
        <h1>Review</h1>
        <div class='review'>
            @foreach($reviews as $review)
                <div class='review'>
                    <h2 class='title'>
                        <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                    </h2>
                        <p class='user_id'>{{ $review->user_id }}</p>
                        <p class='category'>{{ $review->category->name }}</p>
                        <p class='body'>{{ $review->body }}</p>
                        <p class='event_title'>{{ $review->event_title }}</p>
                        <p class='event_body'>{{ $review->event_body }}</p>
                        <p class='event_time'>{{ $review->event_time }}</p>
                </div>
            @endforeach
        </div>
    </body>
</html>