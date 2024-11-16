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
        <form action="{{ route('comments.update', ['review' => $review->id, 'comment' => $comment->id]) }}" method="POST">            @csrf
            @method('PUT')
            <div class='body'>
                <h2>コメント</h2>
                <textarea name="comment[body]" placeholder="コメント入力">{{ old('comment.body',$comment->body) }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('comment.body') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>