<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * ユーザー詳細画面の表示
     */
    public function show(User $user)
    {
        $currentUser = auth()->user();

        // ログイン中のユーザーがフォローしているかを判定
        $isFollowing = $currentUser 
            ? $currentUser->following()->where('users.id', $user->id)->exists() 
            : false;

        // ページネーション付きでレビューを取得し、関連するユーザーをロード
        $own_reviews = Review::with('user')->where('user_id', $user->id)->paginate(10); // Eager Loading で `user` をロード

        // ユーザーのフォロワー数とフォロー数を取得
        $followersCount = $user->getFollowersCount();
        $followingCount = $user->getFollowingCount();

        // ビューにデータを渡す
        return view('users.show', compact('user', 'own_reviews', 'isFollowing', 'followersCount', 'followingCount'));
    }
}
