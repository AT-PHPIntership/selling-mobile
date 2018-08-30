<?php

use Illuminate\Database\Seeder;

class ColorProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ColorProduct::class, 50)->create();
    }
}
