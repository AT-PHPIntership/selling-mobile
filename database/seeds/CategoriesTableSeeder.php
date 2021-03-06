<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Models\Category::class, 15)->create();
        factory(App\Models\Category::class, 15)->states('id')->create();
    }
}
