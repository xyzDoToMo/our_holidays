<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Category</h1>
        <div class='categories'>
            @foreach($categories as $category)
                <div class='category'>
                    <h2 class='name'>{{ $category->name }}</h2>
                </div>
            @endforeach
        </div>
    </body>
</html>