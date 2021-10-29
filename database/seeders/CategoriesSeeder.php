<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'type' => 'Monuments'
        ]);

        DB::table('categories')->insert([
            'type' => 'Restaurants'
        ]);

        DB::table('categories')->insert([
            'type' => 'Divertissements'
        ]);
    }
}