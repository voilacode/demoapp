<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'KT',
            'email' => 'kt@gmail.com',
            'password' => Hash::make('kt123'),
            'phone' => '99999999',
            'age' => '33',
            'role'=>'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Ramu',
            'email' => 'ramu@gmail.com',
            'password' => Hash::make('ramu123'),
            'phone' => '988888',
            'age' => '22',
            'role'=>'moderator'
        ]);
        DB::table('users')->insert([
            'name' => 'Manohar',
            'email' => 'manohar@gmail.com',
            'password' => Hash::make('manohar123'),
            'phone' => '213213',
            'age' => '33'
        ]);
    }
}
