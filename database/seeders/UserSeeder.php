<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'role' => "admin",
            'name' => "Antoni Gomez",
            'email' => "tonigomezjuan@gmail.com",
            'email_verified_at' => "2022-02-04",
            'password' => Hash::make('tonigomez'),
        ]);
    }
}
