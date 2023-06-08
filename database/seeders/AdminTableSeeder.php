<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\AdviserAdmin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'nelsontejara',
            'password' => Hash::make('vsuihshrrs'),
            'email' => 'nelsontejara@gmail.com',
            'role' => '1',
            ]
        ];
        foreach($users as $user){
            User::create($user);
        }
        $adviser_admin_details = [
            ['university_number' => '123786128934',
            'user_id' => '1',
            'firstname' => 'Nelson',
            'middlename' => 'Tejara',
            'lastname' => 'Tejara',
            'phone_number' => '09123456789',
            'home_address' => 'Baybay City, Leyte', 
            ]
        ];
        foreach($adviser_admin_details as $user){
            AdviserAdmin::create($user);
        }
    }
}
