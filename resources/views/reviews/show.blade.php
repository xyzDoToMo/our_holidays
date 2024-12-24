<x-app-layout>
    <div class="container mx-auto p-4 bg-neutral-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">{{ $review->title }}</h1>
                <a href="/reviews/{{ $review->id }}/edit" class="text-blue-500 hover:underline">編集</a>
            </div>
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gray-600">内容</h2>
                <p class="text-gray-800">{{ $review->body }}</p>
            </div>
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-600">開催場所</h3>
                <p class="text-gray-800">{{ $review->event_title }}</p>
            </div>
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-600">期間</h3>
                <p class="text-gray-800">{{ $review->event_time }}</p>
            </div>
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-600">その他特記事項</h3>
                <p class="text-gray-800">{{ $review->event_body }}</p>
            </div>
            <div class="flex justify-between items-center mb-6">
                <span class="text-sm text-gray-600">カテゴリー: <a href="#" class="text-blue-500 hover:underline">{{ $review->category->name }}</a></span>
                <span class="text-sm text-gray-600">投稿者: <a href="/users/{{ $review->user_id }}" class="text-blue-500 hover:underline">{{ $review->user_id }}</a></span>
            </div>

            <div class="mb-6">
                <form action="{{ route('comments.store', ['review' => $review->id]) }}" method="POST">
                    @csrf
                    <textarea name="comment[body]" placeholder="コメント入力" class="w-full p-3 border rounded" rows="3">{{ old('comment.body') }}</textarea>
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('comment.body') }}</p>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded mt-2 hover:bg-blue-600">送信</button>
                </form>
            </div>

            @foreach($review->comments as $comment)
                <div class="mb-4 p-4 bg-gray-100 rounded-lg">
                    <p>{{ $comment->body }}</p>
                    <div class="mt-2 flex justify-between items-center">
                        <a href="{{ route('comments.edit', ['review' => $review->id, 'comment' => $comment->id]) }}" class="text-blue-500 hover:underline">編集</a>
                        <form action="{{ route('comments.delete', ['review' => $review->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-6">
                @if(auth()->user()->likedReviews()->where('review_id', $review->id)->exists())
                    <form action="{{ route('reviews.unlike', ['review' => $review->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            <span class="badge">{{ $review->likedByUsers()->count() }}</span>
                            いいね解除
                        </button>
                    </form>
                @else
                    <form action="{{ route('reviews.like', ['review' => $review->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                            <span class="badge">{{ $review->likedByUsers()->count() }}</span>
                            いいね
                        </button>
                    </form>
                @endif
            </div>

            <div class="mt-6">
                <a href="/" class="text-blue-500 hover:underline">戻る</a>
            </div>
        </div>
    </div>
</x-app-layout>
