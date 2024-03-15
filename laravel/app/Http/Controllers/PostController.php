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
        $posts = Post::with('user', 'category')->skip($page)->take(6)->orderBy('updated_at', 'desc')->get();
        $count = Post::count();
        foreach ($posts as $post) {
            $dataTage =[];
            $tages=DB::table('post_tage')->select('*')->where('post_id', $post->id)->get();
            $reating=DB::table('post_reatings')->select('*')->where('post_id', $post->id)->count();
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTage[] = $tage->name;
            }
            $badge ='';
            if($post->user->points>=150) $badge = "Professional";
            else if($post->user->points>=100) $badge = "Enlightened";
            else if($post->user->points>=50) $badge = "Explainer";
            else if($post->user->points>=0) $badge = "Beginner";
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'views' => $post->views,
                'badge' => $badge,
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
    public function AddQuestions(Request $request)
    {
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->description;
        $post->views = 0;
        $post->image = $filename;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category;
        $post->save();
        $id = $post->id;
        $tages = explode(',', $request->tages) ;
        foreach ($tages as $tage) {
            $post->tages()->attach($tage);
        }
        return response()->json([
            'message' => 'Post created successfully',
            'data' => $filename,
        ]);
    }
    public function MyPost(Request $request,$id)
    {
        $data = [];
        $page = $request->query('page', 1);
        $posts = Post::with('user', 'category')->where('user_id',$id)->skip($page)->take(6)->orderBy('updated_at', 'desc')->get();
        $count = Post::count();
        foreach ($posts as $post) {
            $dataTage =[];
            $dataTageId =[];
            $tages=DB::table('post_tage')->select('*')->where('post_id', $post->id)->get();
            $reating=DB::table('post_reatings')->select('*')->where('post_id', $post->id)->count();
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTage[] = $tage->name;
            }
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTageId[] = $tage->id;
            }
            $badge ='';
            if($post->user->points>=150) $badge = "Professional";
            else if($post->user->points>=100) $badge = "Enlightened";
            else if($post->user->points>=50) $badge = "Explainer";
            else if($post->user->points>=0) $badge = "Beginner";
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'views' => $post->views,
                'badge' => $badge,
                'name' => $post->user->name,
                'category_id' => $post->category->id,
                'category' => $post->category->name,
                'created_at' => Carbon::parse($post->created_at)->format('F j, Y'),
                'tages' => $dataTage,
                'tages_id' => $dataTageId,
                'reating' => $reating,
            ];
        }
        return response()->json([
            'data' => $data,
            'count' => $count,
        ]);
    }
    public function UpdateQuestions(Request $request)
    {
        $post = Post::find($request->id);
        $filename = $post->image;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
        }
        $post->title = $request->title;
        $post->content = $request->description;
        $post->image = $filename;
        $post->category_id = $request->category;
        $post->save();
        $id = $request->id;
        $tages = explode(',', $request->tages) ;
        $post->tages()->detach();
        foreach ($tages as $tage) {
            $post->tages()->attach($tage);
        }
        return response()->json([
            'message' => 'Post updated successfully',
            'data' => $filename,
        ]);
    }
    public function DeletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully',
        ]);
    }
}
         