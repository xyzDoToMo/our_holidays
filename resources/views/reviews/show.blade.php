<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">{{ $review->title }}</h1>
    <body>
        <div class="edit"><a href="/reviews/{{ $review->id }}/edit">edit</a></div>
        <h1 class="title">
            {{ $review->title }}
        </h1>
        <div class="content">
            <div class="content__review">
                <h3>content</h3>
                <h2 class='user_id'>
                            <a href="/users/{{ $review->user_id }}">{{ $review->user_id }}</a>
                </h2>
                <p>{{ $review->body }}</p>
                <a href="">{{ $review->category->name }}</a>
                <p>{{ $review->event_title }}</p>    
                <p>{{ $review->event_body }}</p>
                <p>{{ $review->event_time }}</p>
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
        <div>
            @if(auth()->user()->likedReviews()->where('review_id', $review->id)->exists())
            <form action="{{ route('reviews.unlike', ['review' => $review->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">
                    <span class="badge">{{ $review->likedByUsers()->count() }}</span>
                    いいね解除
                </button>
            </form>
            @else
            <form action="{{ route('reviews.like', ['review' => $review->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">
                    <span class="badge">{{ $review->likedByUsers()->count() }}</span>
                    いいね
                </button>
            </form>
            @endif
        </div>
        <div class box ="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>