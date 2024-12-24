<x-app-layout>
    <div class="container mx-auto p-4 bg-neutral-100 min-h-screen">
        <h1 class="text-3xl font-bold mb-8 text-center">レビュー編集画面</h1>

        <form action="/reviews/{{ $review->id }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <!-- タイトル -->
            <div class="mb-6">
                <label for="review_title" class="block text-lg font-semibold">イベントタイトル</label>
                <input id="review_title" type="text" name="review[title]" 
                       class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="イベントタイトル" value="{{ old('review.title', $review->title) }}"/>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('review.title') }}</p>
            </div>

            <!-- 本文 -->
            <div class="mb-6">
                <label for="review_body" class="block text-lg font-semibold">イベント内容</label>
                <textarea id="review_body" name="review[body]" 
                          class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                          placeholder="どんなイベント">{{ old('review.body', $review->body) }}</textarea>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('review.body') }}</p>
            </div>

            <!-- カテゴリー -->
            <div class="mb-6">
                <label for="review_category_id" class="block text-lg font-semibold">カテゴリー</label>
                <select id="review_category_id" name="review[category_id]" 
                        class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ old('review.category_id', $review->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- イベントタイトル（開催場所） -->
            <div class="mb-6">
                <label for="review_event_title" class="block text-lg font-semibold">開催場所</label>
                <input id="review_event_title" type="text" name="review[event_title]" 
                       class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="開催場所（例：上野公園）" value="{{ old('review.event_title', $review->event_title) }}"/>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('review.event_title') }}</p>
            </div>

            <!-- イベント期間 -->
            <div class="mb-6">
                <label for="review_event_time" class="block text-lg font-semibold">期間</label>
                <input id="review_event_time" type="text" name="review[event_time]" 
                       class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="期間（例：2024.10.24〜11.30）" value="{{ old('review.event_time', $review->event_time) }}"/>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('review.event_time') }}</p>
            </div>

            <!-- 特記事項 -->
            <div class="mb-6">
                <label for="review_event_body" class="block text-lg font-semibold">その他特記事項</label>
                <input id="review_event_body" type="text" name="review[event_body]" 
                       class="w-full p-3 mt-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
                       placeholder="特記事項（例：18歳以上限定）" value="{{ old('review.event_body', $review->event_body) }}"/>
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('review.event_body') }}</p>
            </div>

            <!-- 保存ボタン -->
            <div class="mt-6">
                <button type="submit" 
                        class="w-full p-3 bg-blue-500 text-white font-semibold rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    保存
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
