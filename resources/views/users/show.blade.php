<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">{{ $user->name }} の詳細</h1>
        @auth
            {{-- ログインユーザーが他のユーザーの場合のみフォローボタンを表示 --}}
            @if (auth()->id() !== $user->id)
                <form 
                    action="{{ $isFollowing ? route('user.unfollow', ['user' => $user]) : route('user.follow', ['user' => $user]) }}" 
                    method="POST" 
                    class="mt-4">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-white rounded {{ $isFollowing ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-500 hover:bg-blue-600' }}">
                        {{ $isFollowing ? 'フォローを外す' : 'フォローする' }}
                    </button>
                </form>
            @endif
        @endauth
    </div>
    <div class="own_reviews">
        @foreach($own_reviews as $review)
            <div>
                <h4><a href="/reviews/{{ $review->id }}">{{ $review->title }}</a></h4>
                <small>{{ $review->user->name }}</small>
                <p>{{ $review->body }</p>
            </div>
        @endforeach
        <div class='paginate'>
            {{ $own_reviews->links() }}
        </div>
    </div>
</x-app-layout>