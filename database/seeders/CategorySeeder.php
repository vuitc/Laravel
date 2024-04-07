<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values= [
            ['Đồ bầu', 'do-bau', 'dobau/dobau1.jpg'],
            ['Đồ đôi', 'do-doi', 'dodoi/dodoi1.jpg'],
            ['Đồ cho mẹ và bé', 'do-cho-me-va-be', 'mevabe/mevabe1.jpg'],
            ['Thời trang vintage', 'thoi-trang-vintage', 'vintage/vintage1.jpg'],
            ['Thời trang unisex', 'thoi-trang-unisex', 'unisex/unisex1.jpg'],
          ];
        $key=['name','slug','img_chinh'];
          foreach($values as $item){
            extract($item);
            // tạo mảng mới chưa key và value

          }
          // kết thúc trả về mảng mới chưa key, value
        //
        DB::table('categories')->insert([
            ['name' => 'Áo thun', 'slug' => 'ao-thun', 'img_chinh' => 'aothun/aothun1.jpg'],
            ['name' => 'Áo sơ mi', 'slug' => 'ao-so-mi', 'img_chinh' => 'aosomi/aosomi1.jpg'],
            ['name' => 'Áo kiểu', 'slug' => 'ao-kieu', 'img_chinh' => 'aokieu/aokieu1.jpg'],
            ['name' => 'Quần', 'slug' => 'quan', 'img_chinh' => 'quan/quan1.jpg'],
            ['name' => 'Chân váy', 'slug' => 'chan-vay', 'img_chinh' => 'chanvay/chanvay1.jpg'],
            ['name' => 'Váy', 'slug' => 'vay', 'img_chinh' => 'vay/vay1.jpg'],
            ['name' => 'Áo dài', 'slug' => 'ao-dai', 'img_chinh' => 'aodai/aodai1.jpg'],
        ]);
    }

}
