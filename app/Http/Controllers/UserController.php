<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function createUser(Request $request){
        $user= User::create([
            "name" => $request->input('name', 'xyz'),
            "email" => $request->input('email'),
            "password" => $request->input('password', 'xyz'),

        ]);
        return $user;
    }

    public function findUser(Request $request, User $user=null){
        if($user) return $user;

        $getuser = User::query();
        if ($request->has('name'))
            $getuser->where('name', $request->input('name'));

        if ($request->has('email'))
            $getuser->where('email', $request->input('email'));

        if ($request->has('password'))
            $getuser->where('password', $request->input('password'));

        return $getuser->get();
    }

    public function updateUser(Request $request, User $user){
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        return $user;
    }

    public function deleteUser(Request $request, User $deleteuser){
        return $deleteuser->delete();
    }
}
