<x-app-layout>
    <div class="container mx-auto p-4 bg-neutral-100 min-h-screen">
        <h1 class="text-10xl font-bold mb-8 text-center">Reviews Gallery</h1>
        <a href="{{ route('reviews.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded mb-8">新規投稿</a>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reviews as $review)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow hover:shadow-lg">
                    <div class="bg-blue-500 text-white p-4">
                        <h2 class="text-xl font-bold">{{ $review->title }}</h2>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-600 mb-2">{{ $review->category->name }}</p>
                        <p class="line-clamp-3">{{ $review->body }}</p>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-gray-100">
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded" onclick="openModal({{ $review->id }})">
                            <svg class="inline-block w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            View
                        </button>
                        <form action="{{ route('reviews.delete', $review) }}" method="POST" onsubmit="return confirm('削除すると復元できません。\n本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-lg max-w-2xl w-full">
            <h2 id="modalTitle" class="text-2xl font-bold mb-4"></h2>
            <p id="modalUserId" class="font-semibold"></p>
            <p id="modalCategory" class="text-sm text-gray-600"></p>
            <p id="modalBody" class="mt-2"></p>
            <div class="mt-4 bg-gray-100 p-4 rounded-md">
                <h3 id="modalEventTitle" class="font-semibold"></h3>
                <p id="modalEventTime" class="text-sm"></p>
                <p id="modalEventBody" class="mt-2"></p>
            </div>
            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Close</button>
        </div>
    </div>

    <script>
        function openModal(reviewId) {
            const review = {!! json_encode($reviews->keyBy('id')) !!}[reviewId];
            
            // モーダルに動的に内容をセット
            document.getElementById('modalTitle').textContent = review.title;
            document.getElementById('modalCategory').textContent = review.category.name;
            document.getElementById('modalBody').textContent = review.body;
            document.getElementById('modalEventTitle').textContent = review.event_title;
            document.getElementById('modalEventTime').textContent = review.event_time;
            document.getElementById('modalEventBody').textContent = review.event_body;

            // ユーザーIDにリンクを追加
            const modalUserId = document.getElementById('modalUserId');
            modalUserId.innerHTML = `<a href="/users/${review.user_id}" class="text-blue-500 hover:underline">ユーザーID: ${review.user_id}</a>`;

            // モーダルを表示
            document.getElementById('reviewModal').classList.remove('hidden');
            document.getElementById('reviewModal').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('reviewModal').classList.add('hidden');
            document.getElementById('reviewModal').classList.remove('flex');
        }
    </script>
</x-app-layout>
