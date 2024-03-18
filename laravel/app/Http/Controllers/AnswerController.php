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
    
    public function getPostAnswers($id)
    {
        $postView = Post::find($id);
        $postView->views = $postView->views + 1;
        $postView->save();
        $data = [];
        $dataPost=[];
        $answers = Answer::with('user')->with('post')->where('post_id', $id)->orderBy('id', 'desc')->get();
        $post = Post::with('user', 'category')->where('id',$id)->first();
        $countAnswer =  Answer::with('user')->with('post')->where('post_id', $id)->count();
        foreach ($answers as $answer) {
            $badgeAnswers ='';
            if($answer->user->points>=150) $badgeAnswers = "Professional";
            else if($answer->user->points>=100) $badgeAnswers = "Enlightened";
            else if($answer->user->points>=50) $badgeAnswers = "Explainer";
            else if($answer->user->points>=0) $badgeAnswers = "Beginner";
            $reatingAnswer = DB::table('answer_reatings')->select('*')->where('answer_id', $answer->id)->count();
            $data[] = [
                'id' => $answer->id,
                'questionDetail' => $answer->content,
                'name' => $answer->user->name,
                'user_id' => $answer->user->id,
                'badge' => $badgeAnswers,
                'reating' => $reatingAnswer,
                'date' => Carbon::parse($answer->created_at)->format('F j, Y'),
                
            ];
        }
        $badge ='';
        if($post->user->points>=150) $badge = "Professional";
        else if($post->user->points>=100) $badge = "Enlightened";
        else if($post->user->points>=50) $badge = "Explainer";
        else if($post->user->points>=0) $badge = "Beginner";
        $reating=DB::table('post_reatings')->select('*')->where('post_id', $post->id)->count();

        $dataPost[] = [
            'id' => $post->id,
            'question' => $post->title,
            'questionDetail' => $post->content,
            'views' => $post->views,
            'badge' => $badge,
            'name' => $post->user->name,
            'answor'=>10,
            'image' => asset('uploads/'.$post->image) ,
            'category' => $post->category->name,
            'date' => Carbon::parse($post->created_at)->format('F j, Y'),
            'reating' => $reating,
        ];
        return response()->json([
            'Answers' => $data,
            'post' => $dataPost,  
            'countAnswer'=>$countAnswer 
        ]);
    }
    public function addAnswer(Request $request)
    {
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
    public function deleteAnswer($id){
        $answer = Answer::find($id);
        $answer->delete();
        return response()->json([
            'message' => 'Answer deleted successfully!',
        ]);
    }
    public function updateAnswer(Request $request){
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
}
