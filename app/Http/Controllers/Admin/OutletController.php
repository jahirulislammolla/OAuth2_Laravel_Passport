<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function get(){
        $outlets=Outlet::paginate(15);
        return view('dashboard.admin.outlet.index',['outlets'=>$outlets]);
    }
    public function store(Request $req){
        $outlets=Outlet::create($req->all());
        $outlets->save();
        return redirect()->route('admin_outlet_get');
    }
    public function update(Request $req){
        $outlets=Outlet::where('id',$req->id)->first();
        $outlets->update($req->all());
        $outlets->save();
        return redirect()->route('admin_outlet_get');
    }
    public function delete(Request $req){
        $outlets=Outlet::where('id',$req->id)->first();
        $outlets->delete();
        return redirect()->route('admin_outlet_get');
    }
}
