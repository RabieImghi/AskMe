<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tage;
use App\Models\Post;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function CreateUser(Request $request){
        return response()->json([
            'data' => $request->all(),
        ]);
        // $validatedData = $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'name' => 'required|unique:users',
        //     'email' => 'email|required|unique:users',
        //     'password' => 'required',
        //     'points' => 'required'
        // ]);
        // $validatedData['password'] = Hash::make($request->password);
        // User::create($validatedData);
        // return response()->json([
        //     'data' => "User Created Successfully!",
        // ]);
    }
    // public static function statistique(){
    //     return [
    //         'users' => User::count(),
    //         'questions' => Post::count(),
    //         'answers' => Answer::count(),
    //         'views' => Post::sum('views'),
    //     ];
    // }
    public function getStatisics(){
        
        $tages = Tage::orderBy('id', 'desc')->take(4)->get();
        $users = User::with('posts')->orderBy('points', 'desc')->take(4)->get();
        $userIndfo = [];
        $lastTages = [];
        foreach($tages as $tage){
            $lastTages[] = [ 'id' => $tage->id, 'name' => $tage->name, ];
        }
        foreach($users as $user){
            $badge = '';
            if($user->points>=150) $badge = "Professional";
            else if($user->points>=100) $badge = "Enlightened";
            else if($user->points>=50) $badge = "Explainer";
            else if($user->points>=0) $badge = "Beginner";
            $userIndfo[] = [
                'id' => $user->id,
                'name' => $user->name,
                'level' => $badge,
                'question' => $user->posts->count(),
            ];
        }
        $Statistique=  [
            'users' => User::count(),
            'questions' => Post::count(),
            'answers' => Answer::count(),
            'views' => Post::sum('views'),
        ];
        return response()->json(['Statistiques' => $Statistique, 'TopUsers' => $userIndfo, 'TopTages' => $lastTages]);
        
    }
}
