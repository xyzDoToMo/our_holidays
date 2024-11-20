<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'body',
    ];
    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
}