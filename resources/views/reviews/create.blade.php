<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Review</h1>
    <body>
        <h1>Event Review</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>Event Title</h2>
                <input type="text" name="review[title]" placeholder="イベント" value="{{ old('review.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>contents</h2>
                <textarea name="review[body]" placeholder="どんなイベント">{{ old('review.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="review[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ old('review.category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="event_title">
                <h2>where</h2>
                <textarea name="review[event_title]" placeholder="どこでやってる(例)上野公園)">{{ old('review.event_title') }}</textarea>
                <p class="event_title__error" style="color:red">{{ $errors->first('review.event_title') }}</p>
            </div>
            <div class="event_time">
                <h2>when</h2>
                <textarea name="review[event_time]" placeholder="期間(例）2024.10.24〜11.30)">{{ old('review.event_time') }}</textarea>
                <p class="event_time__error" style="color:red">{{ $errors->first('review.event_time') }}</p>
            </div>
            <div class="event_body">
                <h2>when</h2>
                <textarea name="review[event_body]" placeholder="その他特記事項など(例）18歳以上限定)">{{ old('review.event_body') }}</textarea>
                <p class="event_body__error" style="color:red">{{ $errors->first('review.event_body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</x-app-layout>