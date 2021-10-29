<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'pseudo' => 'Ezziger',
            'email' => 'steven.geay@gmail.com',
            'password' => Hash::make('St3venge@y'),
            'role_id' => 2

        ]);
    }
}
