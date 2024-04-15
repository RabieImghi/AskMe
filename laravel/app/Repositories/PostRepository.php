<?php 

namespace App\Repositories; 

use App\Models\Post; 
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tage;

use App\Repositories\Interfaces\IPostRepository; 

class PostRepository implements IPostRepository 
{ 
    public function getReating($id, $table,$champ){
        return DB::table($table)
            ->select(DB::raw('SUM(case when type = "+" then 1 when type = "-" then -1 else 0 end) as reating'))
            ->where($champ, $id)
            ->first()
            ->reating ?? 0;
    } 
    public function getIdUserVoted($table,$id,$champ){
        return DB::table($table)->select('user_id','type')->where($champ, $id)->get();
    }
    public function allPost($page){
        Post::with('user', 'category')->where('isArchive','0')->skip($page)->take(6)->orderBy('id', 'desc')->get();
    }
    public function allPostCount(){
        return Post::count();
    }
    public function allPostSearchByTage($tageId,$page){
        Post::with('user', 'category')->where('isArchive','0')
        ->whereHas('tages', function($query) use ($tageId) {
            $query->where('tage_id', $tageId);
        })
        ->skip($page)->take(6)->orderBy('id', 'desc')->get();
    }
    public function allPostSearchByContent($value,$page){
        return Post::with('user', 'category')->where('isArchive','0')->where('title','like',"%$value%")
        ->orWhere('content','like',"%$value%")->skip($page)->take(6)
        ->orderBy('id', 'desc')->get();
    }
    public function allPostSearchByCategory($value,$page){
        return Post::with('user', 'category')->where('isArchive','0')
        ->whereHas("category" , function($query) use ($value){
            $query->where('name','like',"%$value%");
        })
        ->skip($page)->take(6)->orderBy('id', 'desc')->get();
    }
    public function allPostTages($post_id){
        return DB::table('post_tage')->select('*')->where('post_id', $post_id)->get();
    }
    public function allPostAnswersCount($post_id){
        return DB::table('answers')->select('*')->where('post_id', $post_id)->count();
    }

    public function AddUserPoints($id){
        $user = User::find($id);
        $user->points=$user->points+ 15;
    }
    public function AddQuestions($request,$filename){
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->description;
        $post->views = 0;
        $post->image = $filename;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category;
        $post->save();
        return $post;
    }
    public function postAttachTage($post, $tage){
        $post->tages()->attach($tage);
    }

    public function MyPost($id,$page){
        return  Post::with('user', 'category')->where('isArchive','0')->where('user_id',$id)->skip($page)->take(6)->orderBy('updated_at', 'desc')->get();
    }
    public function MyPostTgae($id){
        return Tage::find($id);
    }
    public function UpdateQuestionsAttacheTage($post,$tage){
        $post->tages()->attach($tage);
    }
    public function UpdateQuestions($request){
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
        return $post;
    }
    public function DeletePost($id) {
        $post = Post::find($id);
        $post->tages()->detach();
        $fileName = public_path('uploads/') . $post->image;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $post->delete();
    }
    public function ChangeReating($table,$id,$userId){
        return DB::table('post_reatings')->select('*')->where('post_id', $id)->where('user_id', $userId)->first();
    }
    public function ChangeReatingUpdate($table,$reatingId,$type){
        DB::table('post_reatings')->where('id', $reatingId)->update(['type' => $type]);
    }
    public function InsertReating($table,$id,$userId,$type){
        DB::table('post_reatings')->insert(['post_id' => $id, 'user_id' => $userId, 'type' => $type]);
    }
    public function DeleteReating($table,$id){
        DB::table('post_reatings')->where('id', $id)->delete();
    }
    public function ChangeReatingAnswer($request,$id,$userId,$type){}
    public function addViewsPost($id){}
    public function getPostManage($request,$skip){}
    public function changeStatusPost($request){}
}