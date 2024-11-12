<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Postに対するリレーション

//「1対多」の関係なので複数形に
    public function reviews()   
    {
        return $this->hasMany(Review::class);  
    }
}
