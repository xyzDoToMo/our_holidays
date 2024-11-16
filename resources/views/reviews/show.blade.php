<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Review</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="edit"><a href="/reviews/{{ $review->id }}/edit">edit</a></div>
        <h1 class="title">
            {{ $review->title }}
        </h1>
        <div class="content">
            <div class="content__review">
                <h3>content</h3>
                <p>{{ $review->body }}</p>    
                <p>{{ $review->event_title }}</p>    
                <p>{{ $review->event_body }}</p>
                <a href="">{{ $review->category->name }}</a>
            </div>
        </div>
        <form action="{{ route('comments.store', ['review' => $review->id]) }}" method="POST">
            @csrf
            <textarea name="comment[body]" placeholder="コメント入力">{{ old('comment.body') }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            <button type="submit">送信</button>
        </form>
        @foreach($review->comments as $comment)
            <p>{{ $comment->body }}</p>
            <a href="{{ route('comments.edit', ['review' => $review->id, 'comment' => $comment->id]) }}">編集</a>
            <form action="{{ route('comments.delete', ['review' => $review->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
            </form>
        @endforeach
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>