<x-app-layout>
    <div class="container mx-auto p-4 bg-neutral-100 min-h-screen">
        <h1 class="text-4xl font-bold mb-8 text-center">{{ $user ? $user->name : 'ユーザー不明' }} の投稿</h1>

        <!-- フォロワー数とフォロー数の表示 -->
        <div class="flex justify-center mb-8">
            <div class="text-center mx-4">
                <p class="text-lg font-semibold">フォロワー数</p>
                <p class="text-2xl font-bold">{{ $followersCount }}</p>
            </div>
            <div class="text-center mx-4">
                <p class="text-lg font-semibold">フォロー数</p>
                <p class="text-2xl font-bold">{{ $followingCount }}</p>
            </div>
        </div>

        @auth
            @if ($user && auth()->id() !== $user->id)
                <form action="{{ $isFollowing ? route('user.unfollow', ['user' => $user]) : route('user.follow', ['user' => $user]) }}" method="POST" class="mt-4 text-center">
                    @csrf
                    <button type="submit" class="px-6 py-2 text-white rounded {{ $isFollowing ? 'bg-red-500 hover:bg-red-600' : 'bg-blue-500 hover:bg-blue-600' }}">
                        {{ $isFollowing ? 'フォローを外す' : 'フォローする' }}
                    </button>
                </form>
            @endif
        @endauth

        <!-- ユーザーのレビュー一覧 -->
        @if($own_reviews && $own_reviews->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($own_reviews as $review)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                        <div class="bg-blue-500 text-white p-4">
                            <h2 class="text-xl font-bold">{{ $review->title }}</h2>
                        </div>
                        <div class="p-4">
                            <p class="text-sm text-gray-600 mb-2">{{ $review->category->name }}</p>
                            <p class="line-clamp-3">{{ $review->body }}</p>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-gray-100">
                            <a href="/reviews/{{ $review->id }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">詳細</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $own_reviews->links() }}
            </div>
        @else
            <p class="text-center text-lg text-gray-600">レビューがありません。</p>
        @endif
    </div>
</x-app-layout>
