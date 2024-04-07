<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
        ['color' => 'Black'],
        ['color' => 'White'],
        ['color' => 'Red'],
        ['color' => 'Blue'],
        ['color' => 'Green'],
        ]);
    }
}
