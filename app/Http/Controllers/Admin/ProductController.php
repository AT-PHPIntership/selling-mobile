<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('color_products', 'products.id', '=', 'color_products.product_id')
            ->select(DB::raw('count(color_products.color) as count_color, products.*'))
            ->groupBy('products.id')
            ->paginate(config('paging.number_element_in_page'));
        foreach ($products as $productId) {
            $colorProduct = ColorProduct::where('product_id', $productId->id)->get();
            if ($colorProduct[0]->id) {
                $images = Image::where('color_product_id', $colorProduct[0]->id)->get();
                $productId->images =  $images;
            }
        }
        return view('backend.pages.products.index', compact('products', 'colorProduct', 'images'));
    }
}
