<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get(){
        $users=User::where('user_role','<>','super_admin')->paginate(15);
        $user_roles =UserRole::all();
        return view('dashboard.admin.user.index',['users'=>$users,'user_roles'=>$user_roles]);
    }
    public function store(Request $req){
        $user=User::create($req->except('password'));
        $user->password = Hash::make($req->password);
        $user->createToken("token")->accessToken;
        $user->save();
        return redirect()->route('admin_user_get');
    }
    public function update(Request $req){
        $user=User::where('id',$req->id)->first();
        $user->update($req->except('password'));
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->route('admin_user_get');
    }
    public function delete(Request $req){
        $user=User::where('id',$req->id)->first();
        $user->delete();
        return redirect()->route('admin_user_get');
    }

}
