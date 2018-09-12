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
            return view('backend.pages.products.show', compact('product'));
        } catch (Exception $ex) {
            return $ex;
        }
    }

    /**
     * Show the color for Product.
     *
     * @param int $idProduct Products
     * @param int $idColor   ColorProducts
     *
     * @return \Illuminate\Http\Response
     */
    public function getColor($idProduct, $idColor)
    {

        $color =  ColorProduct::where('product_id', $idProduct)->where('id', $idColor)->get();
        return response()->json($color);
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
            $product = Product::with(['images', 'colorProducts'])->findOrFail($id);
            $listCategories= Category::all();
            return view('backend.pages.products.edit', compact('product', 'listCategories'));
        } catch (Exception $ex) {
            return $ex;
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
            $product = Product::with(['colorProducts', 'images'])->findOrFail($id);
            $product->delete();
            Session::flash('message', __('product.admin.message.del'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.products.index');
        } catch (Exception $ex) {
            Session::flash('message', __('product.admin.message.del_fail'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateProductRequest $request CreateProductRequest
     * @param Product              $product Product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, Product $product)
    {
        try {
            $idImageColor = $request->del_image_color;
            ColorProduct::where('id', $idImageColor)->update(array('path_image' => null));
            $idImage = $request->del_image;
            if ($idImage) {
                $imagesDel = explode(",", $idImage);
                $imagesDataDel = array();
                for ($i = 0; $i < count($imagesDel)-1; $i++) {
                    array_push($imagesDataDel, (int) $imagesDel[$i]);
                }
                for ($i = 0; $i < count($imagesDataDel); $i++) {
                    Image::where('id', $imagesDataDel[$i])->delete();
                }
            }
            $product->update($request->all());
            if ($request->color_id) {
                $colorProduct =ColorProduct::findOrFail($request->color_id);
                $colorProduct->price_color_value = $request->price_color_value;
                $colorProduct->price_color_type = $request->price_color_type;
                $colorProduct->quantity = $request->quantity;
                if (request()->file('color_images')) {
                    $imageColor = request()->file('color_images');
                    $newImageColor = $imageColor->getClientOriginalName();
                    $imageColor->move(public_path(config('define.product.images_path_products')), $newImageColor);
                    $colorProduct->path_image = $newImageColor;
                }
                $colorProduct->save();
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
