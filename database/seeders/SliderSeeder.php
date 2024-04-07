<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $values=[
            [ 'carousel-1.jpg', '10% OFF YOUR FIRST ORDER', 'Fashionable Dress\r\n', 1],
            ['carousel-2.jpg', '10% OFF YOUR FIRST ORDER', 'Reasonable Price', 1],
            [ 'offer-1.png', '30% OFF BLACK FRIDAY', 'Spring Collection', 2],
            [ 'offer-2.png', '50% OFF BLACK FRIDAY', 'Winter Collection', 2],
            [ 'vendor-1.jpg', '', '', 3],
            [ 'vendor-2.jpg', '', '', 3],
            ['vendor-3.jpg', '', '', 3],
            ['vendor-4.jpg', '', '', 3],
            ['vendor-5.jpg', '', '', 3],
            ['vendor-6.jpg', '', '', 3],
            ['vendor-7.jpg', '', '', 3],
            ['vendor-8.jpg', '', '', 3],
        ];
        $dataToInsert = array_map(function ($item) {
            return [
                'img' => $item[0],
                'title1' => $item[1],
                'title2' => $item[2],
                'truong'=>$item[3],
            ];
        }, $values);
        DB::table('sliders')->insert($dataToInsert);
    }
}
