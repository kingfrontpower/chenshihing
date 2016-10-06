<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('products')->truncate();
        DB::table("categories")->truncate();
        DB::table("brands")->truncate();

        $this->call(ProductsTableSeeder::class);
        $this->call(CategoiesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);

    }
}
