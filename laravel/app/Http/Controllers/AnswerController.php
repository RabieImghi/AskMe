<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public static function getBadge($points) {
        if($points >= 250) return "Professional";
        else if($points >= 100) return "Enlightened";
        else if($points >= 50) return "Explainer";
        else return "Beginner";
    }
    public static function getReating($id, $table,$champ) {
        return DB::table($table)
            ->select(DB::raw('SUM(case when type = "+" then 1 when type = "-" then -1 else 0 end) as reating'))
            ->where($champ, $id)
            ->first()
            ->reating ?? 0;
    }
    public static function getReatingStatics($id, $table,$champ) {
        return DB::table($table)
            ->select(DB::raw('SUM(case when type = "+" then 1 when type = "-" then 1 else 0 end) as reating'))
            ->where($champ, $id)
            ->first()
            ->reating ?? 0;
    }
    public static function getIdUserVoted($table,$id,$champ) {
        $listIdUserVoted = DB::table($table)->select('user_id','type')->where($champ, $id)->get();
        $IdUserVoted = [];
        foreach ($listIdUserVoted as $idUserVoted) {
            $IdUserVoted[] = [ 'id' => $idUserVoted->user_id, 'type' => $idUserVoted->type,];
        }
        return $IdUserVoted;
    }
    
    public function getPostAnswers($id) {
        $data = [];
        $dataPost = [];
        $answers = Answer::with('user', 'post')->where('post_id', $id)->orderBy('isVerfy','asc')->orderBy('id','desc')->get();
        $post = Post::with('user', 'category')->where('id',$id)->first();
        $countAnswer = Answer::with('user', 'post')->where('post_id', $id)->count();

        foreach ($answers as $answer) {
            $data[] = [
                'id' => $answer->id,
                'questionDetail' => $answer->content,
                'name' => $answer->user->name,
                'user_id' => $answer->user->id,
                'badge' => $this->getBadge($answer->user->points),
                'imageUser' => asset('uploads/'.$answer->user->avatar),
                'reating' => $this->getReating($answer->id, 'answer_reatings', 'answer_id'),
                'listIdUserVoted' => $this->getIdUserVoted('answer_reatings',$answer->id,'answer_id'),
                'date' => Carbon::parse($answer->created_at)->format('F j, Y'),
                'isVerfy'=> $answer->isVerfy,
            ];
        }

        $dataPost[] = [
            'id' => $post->id,
            'question' => $post->title,
            'questionDetail' => $post->content,
            'views' => $post->views,
            'badge' => $this->getBadge($post->user->points),
            'name' => $post->user->name,
            'user_id' => $post->user->id,
            'answor' => 10,
            'image' => asset('uploads/'.$post->image),
            'imageUser' => asset('uploads/'.$post->user->avatar),
            'category' => $post->category->name,
            'date' => Carbon::parse($post->created_at)->format('F j, Y'),
            'listIdUserVoted'=> $this->getIdUserVoted('post_reatings',$post->id,'post_id'),
            'reating' => $this->getReating($post->id, 'post_reatings', 'post_id'),
        ];

        return response()->json([
            'Answers' => $data,
            'post' => $dataPost,  
            'countAnswer' => $countAnswer 
        ]);
    }
    public function addAnswer(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'answerDetails' => 'required',
            'post_id' => 'required',
            'user_id' => 'required'
        ]);
        $answer = new Answer();
        $answer->content = $request->answerDetails;
        $answer->user_id = $request->user_id;
        $answer->post_id = $request->post_id;
        $answer->save();
        $user = User::find($request->user_id);
        $user->points = $user->points + 5;
        $user->save();
        return response()->json([
            'message' => 'Answer added successfully!',
        ]);
    }
    public function deleteAnswer(Request $request,$id){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $answer = Answer::find($id);
        $answer->delete();
        return response()->json([ 'message' => 'Answer deleted successfully!'],200);
    }
    public function updateAnswer(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'answerDetails' => 'required',
            'answerId' => 'required',
        ]);
        $answer = Answer::find($request->answerId);
        $answer->content = $request->answerDetails;
        $answer->save();
        return response()->json([
            'message' => 'Answer updated successfully!',
        ]);
    }
    public function verfyAnswer(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'answerId' => 'required',
        ]);
        $answer = Answer::find($request->answerId);
        $answer->isVerfy ='verfy';
        $answer->save();
        return response()->json([
            'message' => 'Answer verified successfully!',
        ]);
    }
}
