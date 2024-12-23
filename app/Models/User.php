<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function likedReviews()
    {
        return $this->belongsToMany(Review::class, 'likes');
    }

    /**
     * フォローしているユーザー（followingリレーション）
     */
    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'followers',       // 中間テーブル名
            'following_id',       // 中間テーブルの外部キー（自分のID）
            'followed_id'         // 中間テーブルの関連する外部キー（フォローしているユーザーのID）
        )->withTimestamps();
    }

    /**
     * フォロワー（followedリレーション）
     */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'followers',       // 中間テーブル名
            'followed_id',        // 中間テーブルの外部キー（自分がフォローされているID）
            'following_id'        // 中間テーブルの関連する外部キー（フォローしているユーザーのID）
        )->withTimestamps();
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    /**
     * ユーザーが持つレビューの取得（ページネーション）
     */
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('reviews')->find(Auth::id())->review()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    /**
     * フォロワー数を取得
     */
    public function getFollowersCount()
    {
        return $this->followers()->count();
    }

    /**
     * フォロー数を取得
     */
    public function getFollowingCount()
    {
        return $this->following()->count();
    }
}
