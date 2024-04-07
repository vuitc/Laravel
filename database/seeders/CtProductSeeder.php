<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CtProductSeeder extends Seeder
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
            [1, 1, 1, 1200000, 10, 'aodai/aodai1.jpg', 10],
            [1, 1, 2, 1200000, 10, 'aodai/aodai1.jpg', 20],
            [1, 1, 3, 1250000, 10, 'aodai/aodai1.jpg', 20],
            [1, 1, 4, 1250000, 12, 'aodai/aodai1.jpg', 30],
            [1, 1, 5, 1200000, 10, 'aodai/aodai1.jpg', 10],
            [1, 4, 4, 1200000, 10, 'aodai/aodai1.jpg', 20],
            [2, 1, 4, 2200000, 22, 'aodai/aodai2.jpg', 50],
            [3, 1, 4, 780000, 10, 'aothun/aothun1.jpg', 0],
            [4, 5, 3, 800000, 5, 'aosomi/aosomi1.jpg', 20],
            [9, 4, 5, 980000, 4, 'aodai/aodai3.jpg', 10],
            [10, 5, 5, 760000, 3, 'aodai/aodai4.jpg', 20],
            [11, 3, 1, 1650000, 4, 'aodai/aodai10.jpg', 20],
            [12, 2, 4, 800000, 5, 'aodai/aodai5.jpg', 30],
            [13, 1, 2, 800000, 12, 'aodai/aodai6.jpg', 10],
            [14, 5, 4, 2200000, 10, 'aodai/aodai7.jpg', 30],
            [15, 3, 4, 2200000, 4, 'aodai/aodai8.jpg', 10],
            [16, 5, 1, 3300000, 4, 'aodai/aodai9.jpg', 30],
            [17, 5, 4, 580000, 12, 'aothun/aothun2.jpg', 20],
            [18, 3, 3, 860000, 5, 'aothun/aothun3.jpg', 30],
            [19, 2, 4, 980000, 12, 'aosomi/aosomi2.jpg', 30],
        ];
        $dataToInsert = array_map(function ($item) {
            return [
                'idproduct' => $item[0],
                'idcolor' => $item[1],
                'idsize' => $item[2],
                'price'=>$item[3],
                'soluongton'=>$item[4],
                'image'=>$item[5],
                'giamgia'=>$item[6],
            ];
        }, $values);
        DB::table('ct_products')->insert($dataToInsert);
    }
}
