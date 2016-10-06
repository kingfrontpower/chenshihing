<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('zh_TW');
        $name =['牛仔褲' ,'上衣' ,'帽子'];
        
        for($i=0;$i<50;$i++){
            $no = $faker->ean8;
            $product_and_category_id = $faker->numberBetween(0,2);
            $product_name = $name[$product_and_category_id];

//            insert 可改update
            DB::table('products')->insert([
                    'name' => "$product_name-$no",
                    "title" => "$product_name-$no",
                    "description" => $faker->realText(200),
                    "price" => $faker->numberBetween(399, 899),
                    "category_id" => $product_and_category_id+1,
                    "brand_id" => 1,
                    "created_at_ip" => $faker->ipv4,
                    "updated_at_ip" => $faker->ipv4,
                    "created_at" => $faker->date("Y-m-d", "now"),
                    "updated_at" => $faker->date("Y-m-d", "now"),
                ]
            );
        }
    }
}
