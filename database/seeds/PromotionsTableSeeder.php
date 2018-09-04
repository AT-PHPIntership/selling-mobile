<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Promotion;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // A void N+1 problem.
        \DB::table('promotions')->truncate();
        $promotionData = [];
        $products = Product::take(10)->get()->each(function($product) use (&$promotionData) {
            $promotionData[] = factory(Promotion::class)->make([
                'product_id' => $product->id,
            ])->toArray();
        });
        Promotion::insert($promotionData);
    }
}
