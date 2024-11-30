<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Review</h1>
    <body>
        <a href='/reviews/create'>新規投稿</a>
            <div class='review'>
                @foreach($reviews as $review)
                <div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333;">
                    <div class box ='review'>
                        <h2 class='title'>
                            <a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                        </h2>
                        <h2 class='user_id'>
                            <a href="/users/{{ $review->user_id }}">{{ $review->user_id }}</a>
                        </h2>
                            <p class='category'>{{ $review->category->name }}</p>
                            <p class='body'>{{ $review->body }}</p>
                            <p class='event_title'>{{ $review->event_title }}</p>
                            <p class='event_time'>{{ $review->event_time }}</p>
                            <p class='event_body'>{{ $review->event_body }}</p>
                            <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="button" onclick="deleteReview({{ $review->id }})">delete</button> 
                            </form>
                            <script>
                                function deleteReview(id) {
                                    'use strict'
                                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                    document.getElementById(`form_${id}`).submit();
                                    }
                                }
                            </script>
                    </div>
                </div>
                @endforeach
            </div>
            <div class='paginate'>
            {{ $reviews->links() }}
            </div>
    </body>
</x-app-layout>