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
        $products = Product::with(['colorProducts'])->orderBy('created_at', 'desc')->paginate(config('paging.number_element_in_page'));
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategoriesChild = Category::where('parent_id', '<>', null)->get();
        return view('backend.pages.products.create', compact('listCategoriesChild'));
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
            $request->request->add(['product_id'=> $product->id]);
            if (is_array(request()->file('images'))) {
                foreach (request()->file('images') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'product_id' => $product->id,
                        'path_image' => $newImage
                    ];
                }
                if ($request->color) {
                    $request->request->add(['path_image'=> $newImage]);
                    ColorProduct::create($request->all());
                } else {
                    $product->images()->createMany($imagesData);
                }
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
