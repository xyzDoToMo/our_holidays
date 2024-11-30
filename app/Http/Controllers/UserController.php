<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
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

        return view('users.show', compact('user', 'isFollowing'));

    }
}
