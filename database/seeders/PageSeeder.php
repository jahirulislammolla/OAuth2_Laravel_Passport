<?php

namespace Database\Seeders;

use App\Models\PageList;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PageList::truncate();
        $title=['Show User','User Create',"User Update","User Delete",
        'Show User Role',"User Role Create","User Role Update","User Role Delete",
        'Show Role Permission',"Role Permission Update",
        'Show Outlet','Outlet Create',"Outlet Update","Outlet Delete"
        ];
        $route=['user','user/create','user/update','user/delete',
        'user-role','user-role/create','user-role/update','user-role/delete',
        'role-permission','role-permission/update',
        'outlet','outlet/create','outlet/update','outlet/delete'];
        for($i=0; $i<count($route); $i++){
            $pagelist = new PageList();
            $pagelist->title=$title[$i];
            $pagelist->route=$route[$i];
            $pagelist->created_at = Carbon::now()->toDateTimeString();
            $pagelist->save();
        }
    }
}
