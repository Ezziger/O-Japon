<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'nom_region' => 'Hokkaidō'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Tōhoku'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Kantō'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Chūbu'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Kansai'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Chūgoku'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Shikoku'
        ]);

        DB::table('regions')->insert([
            'nom_region' => 'Kyūshū'
        ]);
    }
}
