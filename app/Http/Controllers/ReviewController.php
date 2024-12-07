<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Review $review)
    {
        return view('reviews.index')->with(['reviews' => $review->getPaginateByLimit()]);
    }

    public function show(Review $review)
    {
        return view('reviews.show')->with(['review' => $review]);
    }

    public function create(Category $category)
    {
        return view('reviews.create')->with(['categories' => $category->get()]);
    }

    public function store(Review $review, Request $request)
    {
        $input = $request['review'];
        $input['user_id'] = Auth::id();
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

    public function update(Request $request, Review $review)
    {
        $input_review = $request['review'];
        $review->fill($input_review)->save();
        return redirect('/reviews/' . $review->id);
    }

    public function delete(Review $review)
    {
        Like::where('review_id', $review->id)->delete();
        $review->delete();
        return redirect('/');
    }

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

