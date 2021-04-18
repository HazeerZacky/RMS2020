<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'=>'HAZKY Admin',
            'email'=>'admin@hazky.com',
            'password'=>Hash::make('admin'),
            'role'=>'Admin',
            'user_status'=>'Active'
        ]);
    }
}
