<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function get(){
        $user_roles=UserRole::where('name','<>','super_admin')->paginate(15);
        return view('dashboard.admin.user_role.index',['user_roles'=>$user_roles]);
    }
    public function store(Request $req){
        $user_roles=UserRole::create($req->all());
        $user_roles->save();
        return redirect()->route('admin_user_role_get');
    }
    public function update(Request $req){
        $user_roles=UserRole::where('id',$req->id)->first();
        $user_roles->update($req->all());
        $user_roles->save();
        return redirect()->route('admin_user_role_get');
    }
    public function delete(Request $req){
        $user_roles=UserRole::where('id',$req->id)->first();
        $user_roles->delete();
        return redirect()->route('admin_user_role_get');
    }

}
