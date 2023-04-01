<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name'=>'Test Admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make('password') // insecure credentials
            // but using for test purposes 
        ]);
    }
}