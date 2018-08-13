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
        $products = Product::with(['colorProducts', 'images'])->orderBy('created_at', 'desc')->paginate(config('paging.number_element_in_page'));
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $colorProduct = ColorProduct::findOrFail($id);
            $product = Product::with(['categories'])->findOrFail($colorProduct->product_id);
            return view('backend.pages.products.show', compact('colorProduct', 'product'));
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showColorProduct($id)
    {
        try {
            $colors = ColorProduct::where('product_id', $id)->get();
            return view('backend.pages.products.showcolorproduct', compact('colors'));
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
