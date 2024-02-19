<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category', 'tages')->get();
        return response()->json($posts);
    }
}
