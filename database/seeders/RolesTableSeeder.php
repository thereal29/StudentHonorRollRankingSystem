<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'description' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'description' => 'Adviser',
        ]);
        DB::table('roles')->insert([
            'description' => 'Grade 10',
        ]);
        DB::table('roles')->insert([
            'description' => 'Grade 12',
        ]);
    }
}
