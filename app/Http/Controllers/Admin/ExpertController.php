<?php

namespace App\Http\Controllers\Admin;

use App\Expert;
use App\Followers;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ExpertController extends Controller{

    public function __construct(){


    }

    public function showAddExpertForm(){

        return view('admin.add-expert');
    }

    public function addExpert(Request $request){

        $this->validate($request, [
            'email' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string'],
            'expertise' => ['required', 'string'],
            'about' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'profile_image_base64' => ['required']
        ]);

        $user = User::where('email', $request->email);

        if($user->count() > 0){

            $user = $user->first();
            if(Expert::where('user_id', $user->id)->count() > 0) redirect()->route('admin.expert.new')->with('error', 'User already an expert');

            $expert = new Expert;
            $expert->telephone = $request->tel;
            $expert->expertise = $request->expertise;
            $expert->experience = $request->experience;
            $expert->about = $request->about;
            $expert->user_id = $user->id;

            $image = $request->profile_image_base64;
            $image = str_replace('data:image/png;base64', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'expert_'.$user->id.'_profile.png';
            File::put(storage_path().'/app/public/profile_img/'.$imageName, base64_decode($image));
            $expert->profile_picture = $imageName;

            $expert->save();
            $user->role = 'EXPERT';
            $user->save();
            return redirect()->route('admin.expert.new')->with('success', 'User has been successfully converted to an expert');

        }else return redirect()->route('admin.expert.new')->with('error', 'User with email does not exist')->withInput();
    }

    public function viewExperts(){

        $experts = User::where('role', 'EXPERT')->paginate(15);
        return view('admin.view-experts')->with('experts', $experts);
    }

    public function viewDisabledExperts(){

        $userIds = Expert::where('active', false)->pluck('user_id')->toArray();
        $experts = User::whereIn('id', $userIds)->paginate(15);
        return view('admin.view-experts')->with('experts', $experts);
    }

    public function viewExpert($id){

        $expert = User::find($id);
        $recentPost = Post::where([
            ['type', 'POST'],
            ['user_id', $id]
        ])->orderBy('created_at', 'DESC')->take(3)->get();
        $recentResponse = Reply::where('user_id', $id)->orderBy('created_at', 'DESC')->take(3)->get();

        $data = [
            'expert' => $expert,
            'recentPost' => $recentPost,
            'recentResponses' => $recentResponse,
        ];

        return view('admin.view-expert')->with($data);
    }

    public function removeExpert(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $user = User::find($request->id);
        $expert = $user->expert;

        if($expert) $expert->active = false;
        Followers::where('expert_id', $user->id)->delete();
        $user->role = 'USER';
        $user->save();
        $expert->save();

        return redirect()->route('admin.expert.show', $user->id)->with('success', 'Experts successfully removed');
    }

    public function enableExpert(Request $request){

        $user = User::find($request->id);
        $expert = $user->expert;

        if ($expert) $expert->active = true;
        $user->role = 'EXPERT';
        $user->save();
        $expert->save();

        return redirect()->route('admin.expert.show', $user->id)->with('success', 'Expert enabled');
    }
}
