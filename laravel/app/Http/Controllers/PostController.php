<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function allPost(Request $request){
        
        $data = [];
        $page = $request->query('page', 1);
        if($request->tageId){
            $tageId = $request->tageId;
            $posts = Post::with('user', 'category')->where('isArchive','0')
            ->whereHas('tages', function($query) use ($tageId) {
                $query->where('tage_id', $tageId);
            })
            ->skip($page)->take(6)->orderBy('id', 'desc')->get();
        }else
        if($request->serchType){
            $type =$request->serchType;
            $value = $request->searchQuery;
            if($type=='Post')
                $posts = Post::with('user', 'category')->where('isArchive','0')->where('title','like',"%$value%")
                ->orWhere('content','like',"%$value%")->skip($page)->take(6)->orderBy('id', 'desc')->get();
            else if($type == "Category")
                $posts = Post::with('user', 'category')->where('isArchive','0')
                ->whereHas("category" , function($query) use ($value){
                    $query->where('name','like',"%$value%");
                })
                ->skip($page)->take(6)->orderBy('id', 'desc')->get();
        }
        else{
            $posts = Post::with('user', 'category')->where('isArchive','0')->skip($page)->take(6)->orderBy('id', 'desc')->get();
        }
        $count = Post::count();
        foreach ($posts as $post) {
            $dataTage =[];
            $tages=DB::table('post_tage')->select('*')->where('post_id', $post->id)->get();
            $answers=DB::table('answers')->select('*')->where('post_id', $post->id)->count();
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTage[] = $tage->name;
            }
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'views' => $post->views,
                'answers' => $answers,
                'badge' => AnswerController::getBadge($post->user->points),
                'name' => $post->user->name,
                'user_id' => $post->user->id,
                'imageUser' => asset('uploads/'.$post->user->avatar),
                'category' => $post->category->name,
                'created_at' => Carbon::parse($post->created_at)->format('F j, Y'),
                'tages' => $dataTage,
                'listIdUserVoted'=> AnswerController::getIdUserVoted('post_reatings',$post->id,'post_id'),
                'reating' => AnswerController::getReating($post->id, 'post_reatings', 'post_id'),
            ];
        }
        return response()->json([ 'data' => $data, 'count' => $count, ]);
    }
    
    public function AddQuestions(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tages' => 'required',
        ]);
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
        $user = User::find($request->user_id);
        $user->points = $user->points + 5;
        $user->save();
        return response()->json([
            'message' => 'Post created successfully',
            'data' => $filename,
        ]);
    }
    public function MyPost(Request $request,$id){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $data = [];
        $page = $request->query('page', 1);
        $posts = Post::with('user', 'category')->where('isArchive','0')->where('user_id',$id)->skip($page)->take(6)->orderBy('updated_at', 'desc')->get();
        $count = Post::count();
        foreach ($posts as $post) {
            $dataTage =[];
            $dataTageId =[];
            $tages=DB::table('post_tage')->select('*')->where('post_id', $post->id)->get();
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTage[] = $tage->name;
            }
            foreach ($tages as $tage) {
                $tage = Tage::find($tage->tage_id);
                $dataTageId[] = $tage->id;
            }
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'views' => $post->views,
                'badge' =>  AnswerController::getBadge($post->user->points),
                'name' => $post->user->name,
                'user_id' => $post->user->id,
                'category_id' => $post->category->id,
                'category' => $post->category->name,
                'created_at' => Carbon::parse($post->created_at)->format('F j, Y'),
                'tages' => $dataTage,
                'imageUser' => asset('uploads/'.$post->user->avatar),
                'tages_id' => $dataTageId,
                'listIdUserVoted'=> AnswerController::getIdUserVoted('post_reatings',$post->id,'post_id'),
                'reating' => AnswerController::getReating($post->id, 'post_reatings', 'post_id'),
            ];
        }
        return response()->json([ 'data' => $data, 'count' => $count, ]);
    }
    public function UpdateQuestions(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tages' => 'required',
        ]);
        $post = Post::find($request->id);
        $filename = $post->image;
        if($request->hasFile('image')) {
            $fileName = public_path('uploads/') . $post->image;
            if (file_exists($fileName)) {
                unlink($fileName);
            }
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
    public function DeletePost(Request $request,$id) {
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $post = Post::find($id);
        $post->tages()->detach();
        $fileName = public_path('uploads/') . $post->image;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $post->delete();
        return response()->json([
            'message' => 'Post deleted successfully',
        ]);
    }
    public function ChangeReating(Request $request,$id,$userId,$type){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $reating = DB::table('post_reatings')->select('*')->where('post_id', $id)->where('user_id', $userId)->first();
        if($reating){
            if($type == '+'){
                if($reating->type == '-'){
                    DB::table('post_reatings')->where('id', $reating->id)->update(['type' => '+']);
                    return response()->json([
                        'message' => 'Reating updated successfully',
                    ]);
                }else{
                    DB::table('post_reatings')->where('id', $reating->id)->delete();
                    return response()->json([
                        'message' => 'Reating already exists' ,
                    ]);
                }
            }else{
                if($reating->type == '+'){
                    DB::table('post_reatings')->where('id', $reating->id)->update(['type' => '-']);
                    return response()->json([
                        'message' => 'Reating updated successfully',
                    ]);
                }else{
                    DB::table('post_reatings')->where('id', $reating->id)->delete();
                    return response()->json([
                        'message' => 'Reating already exists' ,
                    ]);
                }
            }
        }else{
            if($type=='+'){
                $reating = DB::table('post_reatings')->insert(['post_id' => $id, 'user_id' => $userId, 'type' => '+']);
                return response()->json([
                    'message' => 'Reating created successfully',
                ]);
            }else{
                $reating = DB::table('post_reatings')->insert(['post_id' => $id, 'user_id' => $userId, 'type' => '-']);
                return response()->json([
                    'message' => 'Reating created successfully',
                ]);
            }
        }
    }
    public function ChangeReatingAnswer(Request $request,$id,$userId,$type){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $reating = DB::table('answer_reatings')->select('*')->where('answer_id', $id)->where('user_id', $userId)->first();
        if($reating){
            if($type == '+'){
                if($reating->type == '-'){
                    DB::table('answer_reatings')->where('id', $reating->id)->update(['type' => '+']);
                    return response()->json([
                        'message' => 'Reating updated successfully',
                    ]);
                }else{
                    DB::table('answer_reatings')->where('id', $reating->id)->delete();
                    return response()->json([
                        'message' => 'Reating already exists' ,
                    ]);
                }
            }else{
                if($reating->type == '+'){
                    DB::table('answer_reatings')->where('id', $reating->id)->update(['type' => '-']);
                    return response()->json([
                        'message' => 'Reating updated successfully',
                    ]);
                }else{
                    DB::table('answer_reatings')->where('id', $reating->id)->delete();
                    return response()->json([
                        'message' => 'Reating already exists' ,
                    ]);
                }
            }
        }else{
            if($type=='+'){
                $reating = DB::table('answer_reatings')->insert(['answer_id' => $id, 'user_id' => $userId, 'type' => '+']);
                return response()->json([
                    'message' => 'Reating created successfully',
                ]);
            }else{
                $reating = DB::table('answer_reatings')->insert(['answer_id' => $id, 'user_id' => $userId, 'type' => '-']);
                return response()->json([
                    'message' => 'Reating created successfully',
                ]);
            }
        }
    }
    public function addViewsPost($id){
        $post = Post::find($id);
        $post->views = $post->views + 1;
        $post->save();
        return response()->json([
            'message' => 'Views added successfully',
        ]);
    }

    public function getPostManage(Request $request,$skip){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $posts = Post::with('user', 'category')->skip($skip)->take(6)->get();
        $data=[];
        foreach ($posts as $post) {
            $data[] = [
                'id' => $post->id,
                'username'=>$post->user->name,
                'category'=>$post->category->name,
                'title' => $post->title,
                'isArchive'=>$post->isArchive,
                'content' => $post->content,
                'category' => $post->category->name,
                'created_at' => Carbon::parse($post->created_at)->format('F j, Y'),
            ];
        }
        return response()->json(['posts' => $data, 'count'=>Post::count()]);
    }
    public function changeStatusPost(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $post = Post::find($request->id);
        if($post->isArchive == "1") $post->isArchive= '0';
        else $post->isArchive="1";
        $post->save();
        return response()->json(['message'=>"updated status secsufully"]);

    }
}
         