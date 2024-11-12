<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;

class ReviewController extends Controller
{
    //
    public function index(Review $review)//インポートしたReviewをインスタンス化して$reviewとして使用。
    {
        return view('reviews.index')->with(['reviews' => $review->get()]);  
    }

/**
 * 特定IDのpostを表示する
 *
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
    public function store(Request $request, Review $review)
    {
        $input = $request['review'];
        $review->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
}
