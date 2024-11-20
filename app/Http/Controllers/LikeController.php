<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Review;
use App\Http\Requests\LikeRequest;


class LikeController extends Controller
{
/**いいねを追加する
     */
    public function like(Request $request, $reviewId)
    {
        $user = auth()->user();
        $review = Review::findOrFail($reviewId);
        if (!$user->likedReviews()->where('review_id', $reviewId)->exists()) {
            $user->likedReviews()->attach($reviewId);
            return redirect()->route('reviews.show', ['review' => $reviewId]);
        }
        return redirect()->route('reviews.show', ['review' => $reviewId]);
    }
    /**いいねを解除する
     */
    public function unlike(Request $request, $reviewId)
    {
        $user = auth()->user();
        $review = Review::findOrFail($reviewId);
        if ($user->likedReviews()->where('review_id', $reviewId)->exists()) {
            $user->likedReviews()->detach($reviewId);
            return redirect()->route('reviews.show', ['review' => $reviewId]);
        }
        return redirect()->route('reviews.show', ['review' => $reviewId]);
    }

}
