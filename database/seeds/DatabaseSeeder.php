<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AboutStoreTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(ColorProductsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
    }
}
