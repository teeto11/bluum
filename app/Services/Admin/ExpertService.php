<?php
namespace App\Services\Admin;

use App\Expert;
use App\Followers;
use App\Post;
use App\Reply;
use App\User;
use Illuminate\Support\Facades\File;

class ExpertService{

    public function view($id) {

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

        return $data;
    }

    public function create($user, $request) {

        if(Expert::where('user_id', $user->id)->count() > 0) return redirect()->route('admin.expert.new')->with('error', 'User already an expert');

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

        $user->role = 'EXPERT';
        if($expert->save() && $user->save()) {
            return true;
        }else return false;
    }

    public function update($id, $request) {

        $user = User::find($id);
        if($user && $user->expert) {
            $expert = $user->expert;
            $expert->telephone = $request->tel;
            $expert->expertise = $request->expertise;
            $expert->about = $request->about;
            $expert->experience = $request->experience;

            if(isset($request->profile_image_base64)) {
                $image = $request->profile_image_base64;
                $image = str_replace('data:image/png;base64', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = 'expert_'.$user->id.'_profile.png';
                File::put(storage_path().'/app/public/profile_img/'.$imageName, base64_decode($image));
                $expert->profile_picture = $imageName;
            }

            if($expert->save()) {
                return true;
            }
        }

        return false;
    }

    public function removeExpert($id) {

        $user = User::find($id);
        if($user) {
            $expert = $user->expert;

            if($expert) $expert->active = false;
            Followers::where('expert_id', $user->id)->delete();
            $user->role = 'USER';
            $expert->save();
            if($user->save()) return $user->id;
        }

        return false;
    }
}