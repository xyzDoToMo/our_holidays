<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Review</title>
    </head>
    <body>
        <h1>Event Review</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="category">
                <h2>Category</h2>
                <select name="review[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="title">
                <h2>Event Title</h2>
                <input type="text" name="review[title]" placeholder="イベント"/>
            </div>
            <div class="body">
                <h2>contents</h2>
                <textarea name="review[body]" placeholder="どんなイベント"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>