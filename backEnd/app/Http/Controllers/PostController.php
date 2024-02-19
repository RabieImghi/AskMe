<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function allPost(Request $request)
    {
        $data = [];
        $page = $request->query('page', 1);
        $posts = Post::with('user', 'category')->skip($page)->take(6)->get();
        $count = Post::count();
        foreach ($posts as $post) {
            $dataTage =[];
            $tages=DB::table('post_tages')->select('*')->where('post_id', $post->id)->get();
            $reating=DB::table('post_reatings')->select('*')->where('post_id', $post->id)->count();
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTage[] = $tage->name;
            }
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'views' => $post->views,
                'name' => $post->user->name,
                'category' => $post->category->name,
                'created_at' => Carbon::parse($post->created_at)->format('F j, Y'),
                'tages' => $dataTage,
                'reating' => $reating,
            ];
        }
        return response()->json([
            'data' => $data,
            'count' => $count,
        ]);
    }
}
         