<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AdviserAdmin;

class AdviserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'juderola',
            'password' => Hash::make('vsuihshrrs'),
            'email' => 'juderola@gmail.com',
            'role' => '2',
            ]
        ];
        foreach($users as $user){
            User::create($user);
        }
        $adviser_admin_details = [
            ['university_number' => '123786123434',
            'user_id' => '2',
            'firstname' => 'Jude',
            'middlename' => 'Bulawan',
            'lastname' => 'Rola',
            'phone_number' => '09123456789',
            'home_address' => 'Baybay City, Leyte', 
            ]
        ];
        foreach($adviser_admin_details as $user){
            AdviserAdmin::create($user);
        }
    }
}
