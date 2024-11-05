<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;

class FollowerController extends Controller
{
    //
    public function index(Follower $follower)
    {
        return view('followers.index')->with(['followers' => $follower->get()]);  
    }
}
