<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'review_id',
        'body',
    ];
    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
