<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ColorProduct;
use App\Models\Category;
use App\Models\Image;
use App\Http\Requests\Backend\CreateProductRequest;
use Exception;
use Session;

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
            $product = Product::with(['colorProducts', 'images'])->findOrFail($id);
            //dd($product->colorProducts);
            return view('backend.pages.products.show', compact('product'));
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * Show the color for Product.
     *
     *@param int $idColor ColorProducts
     *
     * @return \Illuminate\Http\Response
     */
    public function getColor($id)
    {
        
        $color =  ColorProduct::findOrFail($id);
        return response()->json($color);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $childCategories = Category::where('parent_id', '<>', null)->get();
        return view('backend.pages.products.create', compact('childCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Http\Requests\CreateProductRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        try {
            $product = Product::create($request->all());
            if (is_array(request()->color)) {
                for ($i =0; $i < count($request->color) - 1; $i++) {
                    $itemColor = $request->color[$i];
                    $newImage = $itemColor['path_image']->getClientOriginalName();
                    $itemColor['path_image']->move(public_path(config('define.product.images_path_products')), $newImage);
                    $colorsData = [
                        'product_id' => $product->id,
                        'color' => $itemColor['color'],
                        'path_image' => $newImage,
                        'quantity' => $itemColor['quantity'],
                        'price_color_value' => $itemColor['price_color_value'],
                        'price_color_type' => $itemColor['price_color_type']
                    ];
                    $product->colorProducts()->create($colorsData);
                }
            }
            if (is_array(request()->file('images'))) {
                foreach (request()->file('images') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'product_id' => $product->id,
                        'path_image' => $newImage
                    ];
                }
                $product->images()->createMany($imagesData);
            }
            Session::flash('message', __('product.admin.message.add'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        } catch (Exception $ex) {
            Session::flash('message', __('product.admin.message.add_fail'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        }
    }
}
