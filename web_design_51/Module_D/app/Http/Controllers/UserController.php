<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
        if(!$request->has([
            'email',
            'password',
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $user->token = hash('sha256', $user->email);
                $user->save();

                return $this->ok($user->token);
            }
        }
        return $this->error('MSG_INVALID_LOGIN', 403);
    }

    public function logout(Request $request){
        $request->user->token = null;
        $request->user->save();

        return $this->ok();
    }

    public function register(Request $request){
        if(!$request->has([
            'email',
            'password',
            'nickname',
        ])) return $this->error('MSG_MISSING_FIELD', 400);

        if(User::where('email', $request->email)->first()) return $this->error('MSG_USER_EXISTS', 409);

        $user = new User;
        foreach([
            'email',
            'password',
            'nickname',
        ] as $i){
            $user[$i] = $request->input($i);
        }
        $user->save();

        return $this->ok();
    }
}
