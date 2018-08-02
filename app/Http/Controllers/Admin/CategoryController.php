<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EditCategoryRequest;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories['data'] = Category::paginate(config('paging.number_element_in_page'));
        return view('backend.pages.categories.index', $categories);
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
            $data = Category::findOrFail($id);
            if ($data->parent_id) {
                $subCategories = Category::findOrFail($data->parent_id);
            }
            return view('backend.pages.categories.show', compact('subCategories', 'data'));
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
