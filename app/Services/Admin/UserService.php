<?php

namespace App\Services\Admin;


use App\User;
use Illuminate\Support\Facades\DB;

class UserService{

    static public function all($q = null){

        if($q){
            $users = User::where('firstname', 'like', "%$q%")
                            ->orWhere('lastname', 'like', "$q")
                            ->orWhere('email', 'like', "$q")
                            ->orWhere(DB::raw("CONCAT(firstname,' ',lastname)"), 'like', "%$q%")
                            ->orWhere(DB::raw("CONCAT(lastname,' ',firstname)"), 'like', "%$q%")->paginate(20);
        }else $users = User::paginate(20);

        return $users;
    }
}