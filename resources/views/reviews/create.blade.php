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
            <div class="title">
                <h2>Event Title</h2>
                <input type="text" name="review[title]" placeholder="イベント" value="{{ old('review.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>contents</h2>
                <textarea name="review[body]" placeholder="どんなイベント">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="review[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ old('review.category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>