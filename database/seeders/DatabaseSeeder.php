<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
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
            'name'=>'HZacky',
            'email'=>'a@gmail.com',
            'password'=>'123456',
            'role'=>'Admin',
            'user_status'=>'Active'
        ]);
    }
}
