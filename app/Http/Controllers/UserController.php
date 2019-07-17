<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser(Request $request){
        $user = User::whereId($request->json('id'))->first();
        $user->name = $request->json('name');
        $user->save();
        return new UserResource($user);
    }
}
