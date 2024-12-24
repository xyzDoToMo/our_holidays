<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // レビュー一覧
    public function index()
    {
        // ページネーションを追加
        $reviews = Review::with('category') // カテゴリも一緒に取得
                         ->paginate(6);  // ページネーションでレビューを表示
        return view('reviews.index', compact('reviews'));
    }

    // レビュー詳細
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    // レビュー作成画面
    public function create()
    {
        // 全てのカテゴリを取得
        $categories = Category::all();

        // ビューにカテゴリを渡す
        return view('reviews.create', compact('categories'));
    }

    // レビュー保存
    public function store(Request $request)
    {
        $request->validate([
            'review.title' => 'required|string|max:255',
            'review.body' => 'required|string',
            'review.category_id' => 'required|exists:categories,id',
        ]);

        $input = $request->input('review');
        $input['user_id'] = Auth::id();  // ログインユーザーIDをセット
        $review = Review::create($input);

        return redirect()->route('reviews.show', $review->id);
    }

    // レビュー編集画面
    public function edit($id)
    {
        // 編集するレビューを取得
        $review = Review::findOrFail($id);

        // 全てのカテゴリを取得
        $categories = Category::all();

        // ビューにデータを渡す
        return view('reviews.edit', compact('review', 'categories'));
    }

    // レビュー更新
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'review.title' => 'required|string|max:255',
            'review.body' => 'required|string',
            'review.category_id' => 'required|exists:categories,id',
            'review.event_title' => 'required|string',
            'review.event_time' => 'required|string',
            'review.event_body' => 'nullable|string',
        ]);

        // 該当するレビューを取得
        $review = Review::findOrFail($id);

        // レビューの更新
        $review->update([
            'title' => $request->input('review.title'),
            'body' => $request->input('review.body'),
            'category_id' => $request->input('review.category_id'),
            'event_title' => $request->input('review.event_title'),
            'event_time' => $request->input('review.event_time'),
            'event_body' => $request->input('review.event_body'),
        ]);

        // 更新後にリダイレクト
        return redirect()->route('reviews.show', $review->id)->with('success', 'レビューが更新されました');
    }

    // レビュー削除
    public function delete(Review $review)
    {
        // レビューに紐づく「いいね」を削除
        Like::where('review_id', $review->id)->delete();
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'レビューが削除されました');
    }

    // いいね機能
    public function like($id)
    {
        $alreadyLiked = Like::where('review_id', $id)
                            ->where('user_id', Auth::id())
                            ->exists();

        if (!$alreadyLiked) {
            Like::create([
                'review_id' => $id,
                'user_id' => Auth::id(),
            ]);
            session()->flash('success', 'You Liked the Review.');
        } else {
            session()->flash('warning', 'You have already liked this Review.');
        }

        return redirect()->back();
    }

    // いいね取り消し機能
    public function unlike($id)
    {
        $like = Like::where('review_id', $id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($like) {
            $like->delete();
            session()->flash('success', 'You Unliked the Review.');
        } else {
            session()->flash('warning', 'You have not liked this Review.');
        }

        return redirect()->back();
    }
}
