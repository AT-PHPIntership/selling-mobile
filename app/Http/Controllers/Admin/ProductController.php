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
            $colorProduct = ColorProduct::create($request->all());
            if (is_array(request()->file('images'))) {
                foreach (request()->file('images') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'color_product_id' => $colorProduct->id,
                        'path' => $newImage
                    ];
                }
                $colorProduct->images()->createMany($imagesData);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            $colors = ColorProduct::where('product_id', $id)->get();
            $imageProduct = Image::pluck('id', 'color_product_id', 'path');
            $listCategoriesChild = Category::where('parent_id', '<>', null)->get();
            return view('backend.pages.products.edit', compact('colors', 'product', 'imageProduct', 'listCategoriesChild'));
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateProductRequest $request CreateProductRequest
     * @param int                  $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        try {
            Product::findOrFail($id)->update($request->all());
            $request->request->add(['product_id' => $id]);
            $colorProduct = ColorProduct::findOrFail($request->color_id);
            $request->request->add(['color' => $colorProduct->color]);
            $colorProduct->update($request->all());
            Image::where('color_product_id', $request->color_id)->delete();
            if (is_array(request()->file('images'))) {
                foreach (request()->file('images') as $image) {
                    $newImage = $image->getClientOriginalName();
                    $image->move(public_path(config('define.product.images_path_products')), $newImage);
                    $imagesData[] = [
                        'color_product_id' => $colorProduct->id,
                        'path' => $newImage
                    ];
                }
                $colorProduct->images()->createMany($imagesData);
            }
            Session::flash('message', __('product.admin.message.edit'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        } catch (Exception $ex) {
            Session::flash('message', __('product.admin.message.edit_fail'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::with('colorProducts')->findOrFail($id);
            $product->delete();
            Session::flash('message', __('product.admin.message.del'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        } catch (Exception $ex) {
            Session::flash('message', __('product.admin.message.del_fail'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        }
    }
}
