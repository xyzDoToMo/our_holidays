<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">編集画面</h1>
        <form action="/reviews/{{ $review->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='title'>
                <h2>イベント</h2>
                <input type="text" name="review[title]" placeholder="イベント" value="{{ old('review.title',$review->title) }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class='body'>
                <h2>どんなイベント</h2>
                <textarea name="review[body]" placeholder="どんなイベント">{{ old('review.body',$review->body) }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="review[category_id]">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                    {{ old('review.category_id', $review->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class='event_title'>
                <h2>"どこでやってる(例)上野公園)"</h2>
                <input type="text" name="review[event_title]" placeholder="イベント" value="{{ old('review.event_title',$review->event_title) }}"/>
                <p class="event_title__error" style="color:red">{{ $errors->first('review.event_title') }}</p>
            </div>
            <div class='event_time'>
                <h2>"期間(例）2024.10.24〜11.30)"</h2>
                <input type="text" name="review[event_time]" placeholder="イベント" value="{{ old('review.event_time',$review->event_time) }}"/>
                <p class="event_time__error" style="color:red">{{ $errors->first('review.event_time') }}</p>
            </div>
            <div class='event_body'>
                <h2>"その他特記事項など(例）18歳以上限定)"</h2>
                <input type="text" name="review[event_body]" placeholder="イベント" value="{{ old('review.event_body',$review->event_body) }}"/>
                <p class="event_body__error" style="color:red">{{ $errors->first('review.event_body') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</x-app-layout>