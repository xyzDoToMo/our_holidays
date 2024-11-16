<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/reviews/{{ $review->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='title'>
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="イベント" value="{{ old('review.title',$review->title) }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class='body'>
                <h2>本文</h2>
                <textarea name="review[body]" placeholder="どんなイベント">{{ old('review.body',$review->body) }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="review[category_id]">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                    {{ old('review.category_id', $review->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>