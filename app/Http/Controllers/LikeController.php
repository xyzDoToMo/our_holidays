<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function index(Like $like)
    {
        return view('likes.index')->with(['likes' => $like->get()]);  
    }
}
