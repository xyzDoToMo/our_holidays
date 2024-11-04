<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function index(Review $review)//インポートしたReviewをインスタンス化して$reviewとして使用。
    {
        return $review->get();//$postの中身を戻り値にする。
    }
}
