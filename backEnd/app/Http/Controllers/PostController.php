<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::with('user', 'category')->get();
        return response()->json($posts);
    }
}
