<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageList;
use App\Models\RolePermission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RolePrermissionController extends Controller
{
    public function get(){
        $user_roles=UserRole::where('name','<>','super_admin')->get();
        $page_list=PageList::all();
        return view('dashboard.admin.role_permission.index',['user_roles'=>$user_roles,'page_list'=>$page_list]);
    }

    public function update(Request $req){
        $outlets=RolePermission::where('id',$req->id)->first();
        $outlets->update($req->all());
        $outlets->save();
        return redirect()->route('admin_role_permission_get');
    }
}
