<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tage;
use App\Models\Post;
use App\Models\Answer;
use App\Models\Follower;
use App\Models\permession_vues_users;
use Illuminate\Http\Request;
use App\Models\PermessionVue_Role;
use App\Models\SocialLink;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $iUserRepository;
    public function __construct(IUserRepository $iUserRepository){
        $this->iUserRepository = $iUserRepository;
    }
    public function getStatisics(){
        $tages = $this->iUserRepository->getStatisicsTage();
        $users = $this->iUserRepository->getStatisicsUser();
        $userIndfo = [];
        $lastTages = [];
        foreach($tages as $tage){
            $lastTages[] = [ 'id' => $tage->id, 'name' => $tage->name, ];
        }
        foreach($users as $user){
            $userIndfo[] = [
                'id' => $user->id,
                'name' => $user->name,
                'level' => AnswerController::getBadge($user->points),
                'question' => $user->posts->count(),
                'avatar'=> asset('uploads/'.$user->avatar),
            ];
        }
        $Statistique= $this->iUserRepository->getStatisicsCount();
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
    public function getUserInfo($id,$followerId){
        $user = User::with('socialLink')->where('id',$id)->first();
        if(!$user){return response()->json(['message'=>'errore']);}
        $donnation = explode('|',$user->donnationLink);
        
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
            'donnationLink'=>$user->donnationLink,
            'imageProfile'=>asset('uploads/'.$user->avatar),
            'imageCover'=>asset('uploads/'.$user->coverImage),
            'countQuesions' => Post::where('user_id',$id)->count(),
            'countReponse' => Answer::where('user_id',$id)->count(),
            'Point'=>$user->points,
            'followers' => User::find($id)->followers->count(),
            'following' => Follower::where('follower_id',$id)->count(),
            'isFollowed' => Follower::where('user_id',$id)->where('follower_id',$followerId)->count(),
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
            'donnationLink'=>'nullable',

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
        $donnationLink = $user->donnationLink;
        if(!$donnationLink && $request->donnationLink!= ""){
            $user->donnationLink = $request->donnationLink;
            $user->save();
        }else{
            if($request->donnationLink != ""){
                $user->donnationLink =$request->donnationLink;
            }else{
                $user->donnationLink = null;
            }
            $user->save(); 
        }
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
    public function follow(Request $request){
        if(!$request->user()) return response()->json(['message'=>'Unauthenticated'],401);
        $request->validate([
            'user_id' => 'required|integer',
            'follower_id' => 'required|integer',
        ]);
        $follower = Follower::where('user_id',$request->user_id)->where('follower_id',$request->follower_id)->first();
        if($follower == null){
            Follower::create([
                'user_id' => $request->user_id,
                'follower_id' => $request->follower_id,
            ]);
            return response()->json(['message'=>'Followed successfully!']);
        }else{
            $follower->delete();
            return response()->json(['message'=>'Unfollowed successfully!']);
        }
    }
    public function getusers(Request $request,$skip){
        $users = User::with('role')->skip($skip)->take(12)->get();
        $usersData = [];
        foreach($users as $user){
            $usersData[] = [
                'id'=>$user->id,
                'name'=>$user->name,
                'firstName'=>$user->firstname,
                'lastName'=>$user->lastname,
                'about'=>$user->about ?? null,
                'country'=>$user->country,
                'email' => $user->email,
                'role'=> $user->role->name,
                'isBanne'=> $user->isBanne,
                'phone'=>$user->phone ?? null,
                'followers' => User::find($user->id)->followers->count(),
                'following' => Follower::where('follower_id',$user->id)->count(),
                'avatar'=>asset('uploads/'.$user->avatar),
                'coverImage'=>asset('uploads/'.$user->coverImage),
                'Level'=> AnswerController::getBadge($user->points),
                
            ];
        }
        return response()->json(['users'=>$usersData,'userCount'=> User::count(),]);
    }
    public function searchUser(Request $request, $search){
        $users = User::where('name', 'like', '%'.$search.'%')->get();
        $usersData = [];
        foreach($users as $user){
            $usersData[] = [
                'id'=>$user->id,
                'name'=>$user->name,
                'country'=>$user->country,
                'followers' => User::find($user->id)->followers->count(),
                'following' => Follower::where('follower_id',$user->id)->count(),
                'avatar'=>asset('uploads/'.$user->avatar),
                'coverImage'=>asset('uploads/'.$user->coverImage),
                'Level'=> AnswerController::getBadge($user->points),
                
            ];
        }
        return response()->json(['users'=>$usersData,'userCount'=> $users->count(),]);
    }
    public function deleteUser(Request $request){
        if(!$request->user() && $request->user()->role_id != 1) return response()->json(['message'=>'Unauthenticated'],401);
        $user = User::find($request->id);
        if(!$user) return response()->json(['message'=> 'User not found !!']);
        $user->delete();
        return response()->json(['message', 'user deleted successfully']);
    }
    public function banneUser(Request $request){
        if(!$request->user() && $request->user()->role_id != 1) return response()->json(['message'=>'Unauthenticated'],401);
        $user = User::find($request->id);
        if($user->isBanne == "0") $user->update(['isBanne'=>"1"]);
        else $user->update(['isBanne'=>"0"]);
        return response()->json(['message'=>"ok"]);
    }
    public function changeUser(Request $request){
        if(!$request->user() && $request->user()->role_id != 1) return response()->json(['message'=>'Unauthenticated'],401);
        $user = User::find($request->id);
        permession_vues_users::where('user_id',$request->id)->delete();
        $permission=[];
        if($user->role_id == 1){
            $permissions = PermessionVue_Role::where('role_id',2)->pluck('permession_vue_id')->toArray();
            $user->update(['role_id'=>2]);
        }
        else {
            $permissions = PermessionVue_Role::where('role_id',1)->pluck('permession_vue_id')->toArray();
            $user->update(['role_id'=>1]);
        }
        foreach($permissions as $permission){
            permession_vues_users::create([
                'user_id' => $request->id,
                'permession_vue_id' => $permission,
                'is_active'=>1,
                'is_deleted'=>0,
            ]);
        }
        return response()->json(['message'=>"ok"]);
    }
}
