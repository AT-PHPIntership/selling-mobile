<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\Image;
use App\Models\Category;
use Exception;
use Session;
use App\Http\Requests\Backend\CreateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['colorProducts'])->orderBy('id', 'desc')->paginate(config('paging.number_element_in_page'));
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function showchild($id)
    {
        try {
            $colors = ColorProduct::where('product_id', $id)->get();
            return view('backend.pages.products.showChild', compact('colors'));
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
    public function show($id)
    {
        try {
            $colorProduct = ColorProduct::findOrFail($id);
            $product = Product::findOrFail($colorProduct->product_id);
            $imageProduct = ColorProduct::with(['images'])->findOrFail($id)->getRelation('images');
            return view('backend.pages.products.show', compact('colorProduct', 'product', 'imageProduct'));
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
