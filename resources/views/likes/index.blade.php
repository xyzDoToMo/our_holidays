<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Like</h1>
        <div class='like'>
            @foreach($likes as $like)
                <div class='like'>
                </div>
            @endforeach
        </div>
    </body>
</html>