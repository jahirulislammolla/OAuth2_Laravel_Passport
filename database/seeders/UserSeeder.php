<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $default=true;
        if ($default) {
            $user = new User();
            $user->user_role = 'super_admin';
            $user->first_name = 'Mr.Super';
            $user->last_name = 'Admin';
            $user->username = 'super_admin';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'superadmin@gmail.com';
            $user->password = Hash::make('12345678');
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->user_role = 'admin';
            $user->first_name = 'Mr. test';
            $user->last_name = 'Admin';
            $user->username = 'admin';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'admin@gmail.com';
            $user->password = Hash::make('12345678');
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

            $user = new User();
            $user->user_role = 'user';
            $user->first_name = 'Mr. XYZ';
            $user->last_name = 'User';
            $user->username = 'xyz';
            $user->photo = 'avatar.png';
            $user->phone = '+880 123654789';
            $user->email = 'user1@gmail.com';
            $user->password = Hash::make('12345678');
            $user->created_at = Carbon::now()->toDateTimeString();
            $user->save();

        }
    }
}
