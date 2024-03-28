<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tage;
use App\Models\Post;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getStatisics(){
        $tages = Tage::orderBy('id', 'desc')->take(4)->get();
        $users = User::with('posts')->orderBy('points', 'asc')->take(4)->get();
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
    public function uploadImage(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type'=>'required|string',
            'id'=>'required|integer',
        ]);
        $user = User::find($request->id);
        if($request->type == 'Profil'){
            $lastImage = $user->avatar;
            if($lastImage != 'default.png'){
                $file_path = public_path('uploads/'.$lastImage);
                if(file_exists($file_path)) unlink($file_path);
            }
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $user->avatar = $imageName;
            $user->save();
            return response()->json(['image' => asset('uploads/'.$imageName)],200);
        }else if($request->type == 'Cover') {
            $lastImage = $user->coverImage;
            if($lastImage != 'default2.jpg'){
                $file_path = public_path('uploads/'.$lastImage);
                if(file_exists($file_path)) unlink($file_path);
            }
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $imageName);
            $user->coverImage = $imageName;
            $user->save();
            return response()->json(['image' => asset('uploads/'.$imageName)],200);
        }
    }
    public function getUserInfo($id){
        $user = User::with('socialLink')->where('id',$id)->first();
        if(!$user){return response()->json(['message'=>'errore']);}
        $userData = [
            'id'=>$user->id,
            'name'=>$user->name,
            'firstName'=>$user->firstname,
            'lastName'=>$user->lastname,
            'email'=>$user->email,
            'about'=>$user->about ?? null,
            'badge'=> AnswerController::getBadge($user->points),
            'country'=>$user->country ?? null,
            'phone'=>$user->phone ?? null,
            'facebook'=> $user->socialLink->facebook ?? null,
            'twitter'=> $user->socialLink->twitter ?? null,
            'linkedin'=> $user->socialLink->linkedin ?? null,
            'Github'=> $user->socialLink->Github ?? null,
            'instagram'=> $user->socialLink->instagram ?? null,
            'WebSite'=> $user->socialLink->WebSite ?? null,
            'imageProfile'=>asset('uploads/'.$user->avatar),
            'imageCover'=>asset('uploads/'.$user->coverImage),
            'countQuesions' => Post::where('user_id',$id)->count(),
            'countReponse' => Answer::where('user_id',$id)->count(),
            'Point'=>$user->points,
            'Review' => AnswerController::getReatingStatics($id,'post_reatings','user_id') + AnswerController::getReatingStatics($id,'answer_reatings','user_id'),
        ];
        return response()->json(['user'=>$userData]);
    }
    public function updateUserInfo(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'country' => 'nullable',
            'about' => 'nullable',
            'phone' => 'nullable',
            'facebook' => 'nullable',
            'whatsapp' => 'nullable',
            'linkedin' => 'nullable',
            'Github' => 'nullable',
            'emailSosial' => 'nullable|email',
            'WebSite' => 'nullable',
        ]);
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'firstname' => $request->firstName,
            'lastname' => $request->lastName,
            'country' => $request->country,
            'phone' => $request->phone,
            'about'=>$request->about
        ]);
        $socialLink = SocialLink::firstOrCreate(['user_id' => $request->id]);
        $socialLink->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'Github' => $request->Github,
            'instagram' => $request->instagram,
            'WebSite' => $request->WebSite,
        ]);
        return response()->json(['message'=>'User info updated successfully!']);
    }
}
