<?php

namespace App\Http\Controllers\Admin;

use App\Expert;
use App\Followers;
use App\Post;
use App\Reply;
use App\Services\Admin\ExpertService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ExpertController extends Controller{

    public function __construct(){

    }

    public function showAddExpertForm(){
        return view('admin.expert.new');
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

            $expertService = new ExpertService();
            if($expertService->create($user->first(), $request)) {
                $data = ['success' => 'User has been successfully converted to an expert'];
            }else $data = ['error' => 'An error occurred'];

            return redirect()->route('admin.expert.new')->with($data);
        }else return redirect()->route('admin.expert.new')->with('error', 'User with email does not exist')->withInput();
    }

    public function showEditExpertForm($id) {

        $user = User::find($id);
        if($user){
            $user->password = null;
            return view('admin.expert.edit')->with('expert', $user);
        }else return redirect()->route('admin.expert')->with('error', 'invalid expert id');
    }

    public function update($id, Request $request) {

        $this->validate($request, [
            'tel' => ['required', 'string'],
            'expertise' => ['required', 'string'],
            'about' => ['required', 'string'],
            'experience' => ['required', 'string']
        ]);

        $expertService = new ExpertService();
        if($expertService->update($id, $request)) {
            $data = ['success' => 'profile updated'];
        }else $data = ['error' => 'error updating profile'];

        return redirect()->route('admin.expert.edit', $id)->with($data);
    }

    public function viewExperts(){

        $experts = User::where('role', 'EXPERT')->paginate(15);
        return view('admin.expert.index')->with('experts', $experts);
    }

    public function viewDisabledExperts(){

        $userIds = Expert::where('active', false)->pluck('user_id')->toArray();
        $experts = User::whereIn('id', $userIds)->paginate(15);
        return view('admin.expert.index')->with('experts', $experts);
    }

    public function viewExpert($id){

        $experService = new ExpertService();
        $data = $experService->view($id);
        return view('admin.expert.view')->with($data);
    }

    public function removeExpert(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int']
        ]);

        $expertService = new ExpertService();
        $removeExpert = $expertService->removeExpert($request->id);
        if($removeExpert) {
            $data = ['success', 'Experts successfully removed'];
        }else $data = ['error', 'Error removing expert'];
        return redirect()->route('admin.expert.show', $removeExpert)->with($data);
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
