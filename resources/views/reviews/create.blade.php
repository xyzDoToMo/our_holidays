<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Review</h1>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Event Review</h2>
        <form action="/reviews" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Event Title
                </label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="title" 
                    type="text" 
                    name="review[title]" 
                    placeholder="イベント" 
                    value="{{ old('review.title') }}"
                />
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    Contents
                </label>
                <textarea 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="body" 
                    name="review[body]" 
                    placeholder="どんなイベント">{{ old('review.body') }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    Category
                </label>
                <select 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="category" 
                    name="review[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('review.category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="event_title">
                    Where
                </label>
                <textarea 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="event_title" 
                    name="review[event_title]" 
                    placeholder="どこでやってる(例)上野公園)">{{ old('review.event_title') }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.event_title') }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="event_time">
                    When
                </label>
                <textarea 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="event_time" 
                    name="review[event_time]" 
                    placeholder="期間(例）2024.10.24〜11.30)">{{ old('review.event_time') }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.event_time') }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="event_body">
                    Notes
                </label>
                <textarea 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="event_body" 
                    name="review[event_body]" 
                    placeholder="その他特記事項など(例）18歳以上限定)">{{ old('review.event_body') }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.event_body') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <button 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" 
                    type="submit">
                    Store
                </button>
                <a 
                    class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" 
                    href="/">
                    戻る
                </a>
            </div>
        </form>
    </div>
</x-app-layout>









