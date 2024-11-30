<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth; // Authファサードを読み込む

class FollowerController extends Controller
{
    /**
     * フォローする
     */
    public function follow(Request $request, User $user)
    {
        $currentUser = auth()->user();

        // フォローしていない場合のみ追加
        if (!$currentUser->following()->where('followers.followed_id', $user->id)->exists()) {
            $currentUser->following()->attach($user->id, ['created_at' => now(), 'updated_at' => now()]);
        }

        return redirect()->route('user.show', ['user' => $user]);
    }

    /**
     * フォローを解除する
     */
    public function unfollow(Request $request, User $user)
    {
        $currentUser = auth()->user();

        // フォローしている場合のみ解除
        if ($currentUser->following()->where('followers.followed_id', $user->id)->exists()) {
            $currentUser->following()->detach($user->id);
        }

        return redirect()->route('user.show', ['user' => $user]);
    }
}
