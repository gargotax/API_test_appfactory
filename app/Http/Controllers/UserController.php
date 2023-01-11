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

    public function findUser(Request $request, User $finduser=null){
        if($finduser) return $finduser;

        $finduser = User::query();
        if ($request->has('name'))
            $finduser->where('name', $request->input('name'));

        if ($request->has('email'))
            $finduser->where('email', $request->input('email'));

        if ($request->has('password'))
            $finduser->where('password', $request->input('password'));

        return $finduser->get();
    }

    public function updateUser(Request $request, User $update){
        $update->name = $request->input('name');
        $update->email = $request->input('email');
        $update->save();
        return $update;
    }

    public function deleteUser(Request $request, User $delete){
        return $delete->delete();
    }
}
