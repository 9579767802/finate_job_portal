<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => '3',
            'email' => 'admin@example1.com',
            'contact_number' => '12345667890',
            'password' => Hash::make('123456'),
            'role' => 'admin' 
        ]);
        DB::table('users')->insert([
            'first_name' => 'Candidate',
            'last_name' => '3',
            'email' => 'candidate@example.com',
            'contact_number' => '12345667890',
            'password' => Hash::make('123456'),
            'role' => 'candidate'
        ]);
        DB::table('users')->insert([
            'first_name' => 'Employer',
            'last_name' => '12',
            'email' => 'employer@example.com',
            'contact_number' => '12345667890',
            'password' => Hash::make('123456'),
            'role' => 'employers' 
        ]);
    }

}
