<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest; // useする
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    //
    public function index(Review $review)//インポートしたReviewをインスタンス化して$reviewとして使用。
    {
        return view('reviews.index')->with(['reviews' => $review->get()]);  
    }

/**
 * 特定IDのpostを表示する
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse review view
 */
    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
    }
    public function create(Category $category)
    {
        return view('reviews.create')->with(['categories' => $category->get()]);
    }
    public function store(Review $review, ReviewRequest $request) // 引数をRequestからReviewRequestにする
    {
        $input = $request['review'];
        $input['user_id'] = Auth::user()->id;
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    public function edit(Review $review, Category $category)
    {
        return view('reviews.edit')->with([
            'review' => $review,
            'categories' => $category->get()
        ]);
    }
    public function update(ReviewRequest $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();
        return redirect('/reviews/' . $review->id);
    }
    public function delete(Review $review)
    {
        $review->delete();
        return redirect('/');
    }
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
/**
  * 引数のIDに紐づくレビューにLIKEする
  * @param $id レビューID
  * @return \Illuminate\Http\RedirectResponse
  */
    public function like($id)
    {
        Like::create([
            'review_id' => $id,
            'user_id' => Auth::id(),
        ]);
        session()->flash('success', 'You Liked the Review.');
        return redirect()->back();
    }
/**
   * 引数のIDに紐づくリプライにUNLIKEする
   * @param $id リプライID
   * @return \Illuminate\Http\RedirectResponse
   */
    public function unlike($id)
    {
        $like = Like::where('review_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        session()->flash('success', 'You Unliked the Review.');
        return redirect()->back();
    }
}
