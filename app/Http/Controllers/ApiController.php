<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function get_token(Request $request)
    {
        $user = User::find($request->id);
        Auth::login($user);
        return $user->createToken('accessToken')->accessToken;
    }

    public function login(Request $request)
    {
        $req_data = request()->only('email', 'password');
        if (Auth::attempt($req_data)) {
            $user = User::where('id', Auth::user()->id)->first();
            $data=[];
            if($user->user_role == 'user'){
                $data['access_token'] = $user->createToken('accessToken')->accessToken;
                $data['user'] = $user;
                return response()->json($data, 200);
            }
            $data['message'] = 'Only user role can access!!';
            return response()->json($data, 200);
        } else {
            $data['message'] = 'user not exists!!';
            return response()->json($data, 401);
        }
        
    }
}
