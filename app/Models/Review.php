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
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}