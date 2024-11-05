<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Comment</h1>
        <div class='comments'>
            @foreach($comments as $comment)
                <div class='comment'>
                    <h2 class='body'>{{ $comment->body }}</h2>
                </div>
            @endforeach
        </div>
    </body>
</html>