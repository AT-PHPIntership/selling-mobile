<?php

use Illuminate\Database\Seeder;

class AboutStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\AboutStore::class, 10)->create();
    }
}
