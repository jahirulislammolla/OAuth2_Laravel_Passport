<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::truncate();
        $name=['super_admin','admin',"user"];
        for($i=0; $i<count($name); $i++){
            $pagelist = new UserRole();
            $pagelist->name=$name[$i];
            $pagelist->created_at = Carbon::now()->toDateTimeString();
            $pagelist->save();
        }
    }
}
