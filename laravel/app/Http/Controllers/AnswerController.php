<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    
    public function getPostAnswers($id)
    {
        $data = [];
        $dataPost=[];
        $answers = Answer::with('user')->with('post')->where('post_id', $id)->get();
        $post = Post::with('user', 'category')->where('id',$id)->first();
        $countAnswer =  Answer::with('user')->with('post')->where('post_id', $id)->count();
        foreach ($answers as $answer) {
            $badgeAnswers ='';
            if($answer->user->points>=150) $badgeAnswers = "Professional";
            else if($answer->user->points>=100) $badgeAnswers = "Enlightened";
            else if($answer->user->points>=50) $badgeAnswers = "Explainer";
            else if($answer->user->points>=0) $badgeAnswers = "Beginner";
            $data[] = [
                'id' => $answer->id,
                'questionDetail' => $answer->content,
                'name' => $answer->user->name,
                'badge' => $badgeAnswers,
                'date' => Carbon::parse($answer->created_at)->format('F j, Y'),
                'Reviews'=>10,
                
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
}
