<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Review;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    //
    public function store(Review $review, Comment $comment, CommentRequest $request) // 引数をRequestからReviewRequestにする
    {
        $input = $request['comment'];
        $input['review_id'] = $review->id;
        $input['user_id'] = Auth::user()->id;
        $comment->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    public function edit(Review $review,Comment $comment)
    {
        return view('comments.edit')->with([
            'review' => $review,
            'comment' => $comment,
        ]);
    }
    public function update(Review $review, Comment $comment, CommentRequest $request)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/reviews/' . $review->id);
    }
    public function delete(Review $review, Comment $comment)
    {
        $comment->delete();
        return redirect('/reviews/' . $review->id);
    }
}

