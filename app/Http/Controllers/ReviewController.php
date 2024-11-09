<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function index(Review $review)//インポートしたReviewをインスタンス化して$reviewとして使用。
    {
        return view('reviews.index')->with(['reviews' => $review->get()]);  
    }
    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
    }
}
