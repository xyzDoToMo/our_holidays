<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
}